<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::withTrashed()->get();
        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(StoreCategoryRequest $request)
    {
        if (!empty($request->image)){

            $imageName = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);

        }
        Category::create(['name' => $request->name, 'image' => $imageName]);
        return redirect()->route('admin.categories.index');
    }


    public function show(Category $category)
    {

    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $imageName = $category->image;
        if (!empty($request->image)){

            $imageName = time().$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);

        }
        $category->update(['name' => $request->name, 'image' => $imageName]);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->where('id', $id)->get()->first();
        $category->deleted_at = null;
        $category->save();
        return redirect()->route('admin.categories.index');
    }
}
