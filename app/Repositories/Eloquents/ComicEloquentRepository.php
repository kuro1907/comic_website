<?php

namespace App\Repositories\Eloquents;

use App\Models\Comic;
use App\Repositories\Contracts\ComicRepository;

class ComicEloquentRepository implements ComicRepository
{
    public function getList()
    {
        return Comic::paginate(20);
    }
    public function getPaginate()
    {
        return Comic::paginate(5);
    }

    public function getLastestChapter($id)
    {
        $lastest_chapter = $this->getById($id)->chapters()->orderBy('dayRelease', 'DESC')->first();
        return $lastest_chapter;
    }

    public function getAllChapter($id)
    {
        $chapters = $this->getById($id)->chapters()->orderBy('number', 'DESC')->get();
        return $chapters;
    }

    public function getChapter($id, $chapter_id)
    {
        $chapter = $this->getById($id)->chapters()->where('id', $chapter_id)->get();
        return $chapter;
    }

    public function getAuthor($id)
    {
    }

    public function getById($id)
    {
        return Comic::find($id);
    }
    public function create($attributes)
    {
        return Comic::create($attributes);
    }
    public function update($id, $attributes)
    {
        $entity = $this->getById($id);
        $entity->name           = $attributes['name'];
        $entity->description    = $attributes['description'];
        $entity->slide          = $attributes['slide'];
        $entity->status         = $attributes['status'];
        if (isset($attributes['img'])) {
            $entity->img            = $attributes['img'];
        }
        if (isset($attributes['cover_img'])) {
            $entity->cover_img      = $attributes['cover_img'];
        }
        $entity->save();
    }
    public function delete($id)
    {
        $entity = $this->getById($id);
        $entity->delete();
    }

    public function search($keyword)
    {

        // dd($keyword);
        return Comic::where('name', 'like', '%' . $keyword . '%')->get();
    }
}
