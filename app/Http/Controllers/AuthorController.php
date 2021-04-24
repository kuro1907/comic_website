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
            $img = $request->file('img');
            $img_name = time() . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('/storage/img/authors/');
            $img->move($destinationPath, $img_name);
        }

        $attributes = [
            'name'          => $request->name,
            'dayBirth'      => $request->dayBirth,
            'description'   => $request->description,
            'img'           => $img_name
        ];

        // dd($attributes);
        $this->authorRepository->create($attributes);

        return redirect('/admin/authors');
    }
}
