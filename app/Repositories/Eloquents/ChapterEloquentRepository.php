<?php

namespace App\Repositories\Eloquents;

use App\Models\Chapter;
use App\Repositories\Contracts\ChapterRepository;

class ChapterEloquentRepository implements ChapterRepository
{
    public function getList()
    {
        return Chapter::all();
    }
    public function getPaginate()
    {
        return Chapter::paginate(5);
    }
    public function getById($id)
    {
        return Chapter::find($id);
    }
    public function create($attributes)
    {
        return Chapter::create($attributes);
    }
    public function update($id, $attributes)
    {
        $entity = $this->getById($id);
        $entity->name           = $attributes['name'];
        $entity->number         = $attributes['number'];
        $entity->content        = $attributes['content'];
        $entity->save();
    }
    public function delete($id)
    {
        $entity = $this->getById($id);
        $entity->destroy();
    }
}
