<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ComicRepository;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    protected $comicRepository;

    public function __construct(ComicRepository $comicRepository)
    {
        $this->comicRepository = $comicRepository;
    }

    public function getComics()
    {
        $comics = $this->comicRepository->getList();
        return view('dashboard.comics.list', compact('comics'));
    }
}
