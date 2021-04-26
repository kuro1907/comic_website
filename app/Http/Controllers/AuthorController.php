<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\AuthorRepository;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getAuthors()
    {
        $authors = $this->authorRepository->getPaginate();
        return view('dashboard.authors.list', compact('authors'));
    }

    public function createAuthor()
    {
        return view('dashboard.authors.create');
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
        $author = $this->authorRepository->getById($id);
        return view('dashboard.authors.detail', compact('author'));
    }

    public function edit($id)
    {
        $author = $this->authorRepository->getById($id);
        return view('dashboard.authors.edit', compact('author'));
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
