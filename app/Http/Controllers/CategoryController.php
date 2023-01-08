<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::get();
        return view('dashboard.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create ()
    {
        return view('dashboard.categories.create');
    }

    public function store (StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request->input('name')
        ]);
        return redirect(route('categories'))->with('category', 'Category created successfully!');
    }

    public function edit ($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    public function update (UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->input('name')
        ]);
        return redirect(route('categories'))->with('category', 'Category Updated successfully!');
    }

}
