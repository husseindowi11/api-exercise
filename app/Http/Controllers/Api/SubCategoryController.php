<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubCategoryResource;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subCategories = SubCategory::with('items')->get();

        return $subCategories;
    }


    public function show(Request $request)
    {
        $sub_category = SubCategory::find($request->id);
        $sub_category->load('items');
        return $sub_category;
    }



}
