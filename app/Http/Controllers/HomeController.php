<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Repositories\Contracts\AuthorRepository;
use App\Repositories\Contracts\CategoryRepository;
use App\Repositories\Contracts\ChapterRepository;
use App\Repositories\Contracts\ComicRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $slides      = $this->comicRepository->getSlides();
        $user       = Auth::user();


        $lastestChapterList = [];
        foreach ($comics as $comic) {
            $lastestChapterList[] = $this->comicRepository->getLastestChapter($comic->id);
        }
        return view('index', compact('slides', 'categories', 'comics', 'lastestChapterList', 'user'));
    }

    public function details($id)
    {
        $user       = Auth::user();
        $categories = $this->categoryRepository->getList();
        $entities = $this->comicRepository->getById($id);
        $author = $this->authorRepository->getById($entities->author_id)->name;
        $chapters = $this->comicRepository->getAllChapter($id);
        return view('comic/detail-comic', compact('entities', 'categories', 'chapters', 'author', 'user'));
    }

    public function viewChapter($id, $chapter_id)
    {
        $categories = $this->categoryRepository->getList();
        $comic   = $this->comicRepository->getById($id);
        $chapters   = $this->comicRepository->getAllChapter($id);
        $chapter    = $this->comicRepository->getChapter($id, $chapter_id);
        $user       = Auth::user();

        return view('comic/chapter', compact('categories', 'comic', 'chapters', 'chapter', 'user'));
    }

    public function dashboard()
    {
        $user   = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function search(Request $request)
    {
        $categories = $this->categoryRepository->getList();
        $user       = Auth::user();


        $keyword = $request->keyword;
        // dd($keyword);
        $comics = $this->comicRepository->search($keyword);
        $lastestChapterList = [];
        foreach ($comics as $comic) {
            $lastestChapterList[] = $this->comicRepository->getLastestChapter($comic->id);
        }
        return view('listComic', compact('comics', 'user', 'categories', 'lastestChapterList'));
    }

    public function searchCategory($category)
    {
        $categories = $this->categoryRepository->getList();
        $user       = Auth::user();
        $comics = $this->comicRepository->searchCategory($category);
        $lastestChapterList = [];
        foreach ($comics as $comic) {
            $lastestChapterList[] = $this->comicRepository->getLastestChapter($comic->id);
        }
        return view('listComic', compact('comics', 'user', 'categories', 'lastestChapterList'));
    }
}
