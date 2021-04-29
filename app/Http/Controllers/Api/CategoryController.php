<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('sub_categories.items.images')->get();
        return $categories;
    }


    public function show(Request $request)
    {
        $category = Category::find($request->category_id);
        $category->load('sub_categories.items');
        return $category;
    }

}
