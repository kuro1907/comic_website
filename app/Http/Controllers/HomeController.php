<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Repositories\Contracts\AuthorRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ChapterRepository;
use App\Repositories\Contracts\ComicRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $categoryRepository;
    protected $comicRepository;
    protected $chapterRepository;
    protected $authorRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ComicRepository $comicRepository,
        ChapterRepository $chapterRepository,
        AuthorRepository $authorRepository
    ) {
        $this->categoryRepository   = $categoryRepository;
        $this->comicRepository      = $comicRepository;
        $this->chapterRepository    = $chapterRepository;
        $this->authorRepository     = $authorRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getList();
        $comics     = $this->comicRepository->getList();
        $lastestChapterList = [];
        foreach ($comics as $comic) {
            $lastestChapterList[] = $this->comicRepository->getLastestChapter($comic->id);
        }
        return view('index', compact('categories', 'comics', 'lastestChapterList'));
    }

    public function details($id)
    {
        $categories = $this->categoryRepository->getList();
        $entities = $this->comicRepository->getById($id);
        $author = $this->authorRepository->getById($entities->author_id)->name;
        $chapters = $this->comicRepository->getAllChapter($id);
        return view('comic/detail-comic', compact('entities', 'categories', 'chapters', 'author'));
    }
}
