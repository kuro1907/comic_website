<?php

namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\Contracts\UserRepository;

class UserEloquentRepository implements UserRepository
{
    public function getList()
    {
        return User::all();
    }

    public function getById($id)
    {
        return User::find($id);
    }
    public function create($attributes)
    {
        return User::create($attributes);
    }
    public function update($id, $attributes)
    {
        $entity = $this->getById($id);
        $entity->name = $attributes->name;
        $entity->email = $attributes->email;
        $entity->password = $attributes->password;
        $entity->save();
    }
    public function delete($id)
    {
        $entity = $this->getById($id);
        $entity->destroy();
    }

    public function getPaginate()
    {
        return User::paginate(5);
    }
}
