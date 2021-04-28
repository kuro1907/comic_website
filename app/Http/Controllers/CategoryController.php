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
        $user       = Auth::user();
        $categories = $this->categoryRepository->getPaginate();
        return view('dashboard.categories.list', compact('categories', 'user'));
    }

    public function createCategories()
    {
        $user       = Auth::user();
        return view('dashboard.categories.create', 'user');
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
        $user       = Auth::user();
        $category = $this->categoryRepository->getById($id);
        return view('dashboard.categories.edit', compact('category', 'user'));
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
