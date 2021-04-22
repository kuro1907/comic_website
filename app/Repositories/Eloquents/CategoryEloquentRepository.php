<?php

namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository;

class CategoryEloquentRepository implements CategoryRepository
{
    public function getList()
    {
        return Category::all();
    }
    public function getById($id)
    {
        return Category::find($id);
    }
    public function create($attributes)
    {
        return Category::create($attributes);
    }
    public function update($id, $attributes)
    {
        $entity = $this->getById($id);
        $entity->name = $attributes['name'];
        $entity->save();
    }
    public function delete($id)
    {
        $entity = $this->getById($id);
        $entity->destroy();
    }
}
