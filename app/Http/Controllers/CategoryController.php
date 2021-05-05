<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository =  $categoryRepository;
    }

    public function getCategories()
    {
        $categories = $this->categoryRepository->getPaginate();
        return view('dashboard.categories.list', compact('categories'));
    }

    public function createCategories()
    {
        return view('dashboard.categories.create');
    }

    public function storeCategories(Request $request)
    {
        $attributes = [
            'name' => $request->name
        ];

        $this->categoryRepository->create($attributes);
        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->getById($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    public function updateCategory($id, Request $request)
    {
        $attributes = [
            'name' => $request->name
        ];
        $this->categoryRepository->update($id, $attributes);
        return redirect('/admin/categories');
    }

    public function deleteCategory($id)
    {
        $this->categoryRepository->delete($id);
        return redirect('/admin/categories');
    }
}
