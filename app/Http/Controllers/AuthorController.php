<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AuthorRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getAuthors()
    {
        $user       = Auth::user();
        $authors = $this->authorRepository->getPaginate();
        return view('dashboard.authors.list', compact('authors', 'user'));
    }

    public function createAuthor()
    {
        $user       = Auth::user();
        return view('dashboard.authors.create', 'user');
    }

    public function storeAuthor(request $request)
    {
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/img/authors/');
            $image->move($destinationPath, $imgName);
            $img = '/storage/img/authors/' . $imgName;
            $attributes = [
                'name'          => $request->name,
                'dayBirth'      => $request->dayBirth,
                'description'   => $request->description,
                'img'           => $img
            ];
        } else {
            $img = '/storage/img/authors/unknown.png';
            $attributes = [
                'name'          => $request->name,
                'dayBirth'      => $request->dayBirth,
                'description'   => $request->description,
                'img'           => $img
            ];
        }
        $this->authorRepository->create($attributes);
        return redirect('/admin/authors');
    }
    public function details($id)
    {
        $user       = Auth::user();
        $author = $this->authorRepository->getById($id);
        return view('dashboard.authors.detail', compact('author', 'user'));
    }

    public function edit($id)
    {
        $user       = Auth::user();
        $author = $this->authorRepository->getById($id);
        return view('dashboard.authors.edit', compact('author', 'user'));
    }

    public function updateAuthor($id, Request $request)
    {
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/img/authors/');
            $image->move($destinationPath, $imgName);
            $img = '/storage/img/authors/' . $imgName;
            $attributes = [
                'name'          =>  $request->name,
                'dayBirth'      =>  $request->dayBirth,
                'description'   =>  $request->description,
                'img'           =>  $img
            ];
        } else {
            $attributes = [
                'name'          =>  $request->name,
                'dayBirth'      =>  $request->dayBirth,
                'description'   =>  $request->description,
            ];
        }
        $this->authorRepository->update($id, $attributes);
        return redirect('/admin/authors');
    }

    public function deleteAuthor($id)
    {
        $this->authorRepository->delete($id);

        return redirect('/admin/authors');
    }
}
