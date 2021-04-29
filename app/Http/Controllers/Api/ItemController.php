<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{


    public function index()
    {
        $items = Item::with('sub_category.category')->get();
        return $items;
    }

    public function show(Request $request)
    {
        $item = Item::find($request->id);
        $item->load('sub_category.category');
        return $item;
    }



}
