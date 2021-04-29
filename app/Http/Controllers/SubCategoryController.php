<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::withTrashed()->get();
        $subcategories->load('category');
        return view('admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('categories'));
    }

    public function store(StoreSubCategoryRequest $request)
    {
        SubCategory::create($request->validated());
        return redirect()->route('admin.subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory','categories'));
    }

    public function update(UpdateSubCategoryRequest $request, SubCategory $subcategory)
    {
        $subcategory->update($request->validated());
        return redirect()->route('admin.subcategories.index');
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('admin.subcategories.index');
    }

    public function restore($id)
    {
        $subcategory = SubCategory::withTrashed()->where('id', $id)->get()->first();
        $subcategory->deleted_at = null;
        $subcategory->save();
        return redirect()->route('admin.subcategories.index');
    }
}
