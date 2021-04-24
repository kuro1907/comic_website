<?php

namespace App\Repositories\Eloquents;

use App\Models\Author;
use App\Repositories\Contracts\AuthorRepository;

class AuthorEloquentRepository implements AuthorRepository
{
    public function getList()
    {
        return Author::all();
    }
    public function getPaginate()
    {
        return Author::paginate(5);
    }

    public function getById($id)
    {
        return Author::find($id);
    }
    public function create($attributes)
    {
        return Author::create($attributes);
    }
    public function update($id, $attributes)
    {
        $entity = $this->getById($id);
        $entity->name           = $attributes['name'];
        $entity->dayBirth       = $attributes['dayBirth'];
        $entity->description    = $attributes['description'];
        $entity->img            = $attributes['img'];
        $entity->save();
    }
    public function delete($id)
    {
        $entity = $this->getById($id);
        $entity->destroy();
    }
}
