<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ComicRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComicsController extends Controller
{
    protected $comicRepository;

    public function __construct(ComicRepository $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    public function getComics()
    {
        $user       = Auth::user();
        $comics = $this->comicRepository->getPaginate();
        return view('dashboard.comics.list', compact('comics', 'user'));
    }

    public function createComic()
    {
        $user       = Auth::user();
        return view('dashboard.comics.create', compact('user'));
    }

    public function storeComic(Request $request)
    {
        $clean_name = str_replace(" ", "-", $request->name);
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('\storage\img/' . $clean_name);
            $image->move($destinationPath, $imgName);
            $img = '\storage\img/' . $clean_name . '/' . $imgName;
        } else {
            $img = '/storage/img/unknown.png';
        }
        if ($request->hasFile('cover_img')) {
            $cover_img = $request->file('cover_img');
            $cover_imgName = 'cover' . time() . '.' . $cover_img->getClientOriginalExtension();
            $coverDestinationPath = public_path('\storage\img/' . $clean_name);
            $cover_img->move($coverDestinationPath, $cover_imgName);
            $cover_img = '\storage\img/' . $clean_name . '/' . $cover_imgName;
        } else {
            $cover_img = '/storage/img/unknown.png';
        }
        $attributes = [
            'name'          => $request->name,
            'description'   => $request->description,
            'status'        => $request->status,
            'img'           => $img,
            'cover_img'     => $cover_img
        ];
        $this->comicRepository->create($attributes);
        return redirect('/admin/comics');
    }

    public function details($id)
    {
        $user       = Auth::user();
        $comic = $this->comicRepository->getById($id);
        $chapters = $this->comicRepository->getAllChapter($id);
        return view('dashboard.comics.detail', compact('comic', 'chapters', 'user'));
    }

    public function edit($id)
    {
        $user       = Auth::user();
        $comic = $this->comicRepository->getById($id);
        return view('dashboard.comics.edit', compact('comic', 'user'));
    }

    public function updateComic($id, Request $request)
    {
        $attributes = [
            'name'          => $request->name,
            'description'   => $request->description,
            'slide'         => $request->slide,
            'status'        => $request->status
        ];
        $clean_name = str_replace(" ", "-", $request->name);
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('\storage\img/' . $clean_name);
            $image->move($destinationPath, $imgName);
            $img = '\storage\img/' . $clean_name . '/' . $imgName;
            $attributes['img'] = $img;
        }

        if ($request->hasFile('cover_img')) {
            $cover_img = $request->file('cover_img');
            $cover_imgName = 'cover' . time() . '.' . $cover_img->getClientOriginalExtension();
            $coverDestinationPath = public_path('\storage\img/' . $clean_name);
            $cover_img->move($coverDestinationPath, $cover_imgName);
            $cover_img = '\storage\img/' . $clean_name . '/' . $cover_imgName;
            $attributes['cover_img'] = $cover_img;
        }
        $this->comicRepository->update($id, $attributes);
        return redirect('/admin/comics');
    }

    public function deleteComic($id)
    {
        $this->comicRepository->delete($id);
        return redirect('/admin/comics');
    }
}
