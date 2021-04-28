<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ChapterRepository;
use App\Repositories\Contracts\ComicRepository;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    protected $chapterRepository;
    public function __construct(ChapterRepository $chapterRepository, ComicRepository $comicRepository)
    {
        $this->chapterRepository =  $chapterRepository;
    }

    public function addChapter($id)
    {
        $user       = Auth::user();
        return view('dashboard.comics.add-chapter', compact('id', 'user'));
    }

    public function storeChapter($id, Request $request)
    {
        $attributes = [
            'name'          => $request->name,
            'number'        => $request->number,
            'content'       => $request->content,
            'dayRelease'   => date("Y-m-d H:i:s"),
            'comic_id'      => $id
        ];

        $this->chapterRepository->create($attributes);
        return redirect()->route('details', ['id' => $id]);
    }
}
