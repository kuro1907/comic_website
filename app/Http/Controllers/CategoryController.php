<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository =  $categoryRepository;
    }

    public function getCategories()
    {
        $categories = $this->categoryRepository->getList();
        return view('dashboard.categories.list', compact('categories'));
    }
}
