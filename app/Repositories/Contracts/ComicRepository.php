<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\BaseRepository;

interface ComicRepository extends BaseRepository
{
    public function getSlides();

    public function getLastestChapter($id);
    public function getAllChapter($id);
    public function getChapter($id, $chapter_id);
    public function search($keyword);
    public function searchCategory($category);
}
