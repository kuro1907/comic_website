<?php

namespace App\Repositories\Contracts;

interface BaseRepository
{
    public function getList();
    public function getById($id);
    public function create($attributes);
    public function update($id, $attributes);
    public function delete($id);
    public function getPaginate();
}
