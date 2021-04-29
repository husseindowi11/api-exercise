<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\ItemImage;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::withTrashed()->get();
        $items->load('sub_category');
        return view('admin.items.index', compact('items'));
    }


    public function create()
    {
        $subcategories = SubCategory::all();
        return view('admin.items.create', compact('subcategories'));
    }


    public function store(StoreItemRequest $request)
    {

        $item = Item::create($request->all());

        if (!empty($request->file)){
            foreach (\request('file') as $file){
                $imageName = time().$file->getClientOriginalName();
                ItemImage::create(['item_id' => $item->id, 'image' => $imageName]);
                $file->move(public_path('images'), $imageName);
            }
        }

        return back();
    }


    public function show(Item $item)
    {
        $item->load('images');
        return view('admin.items.show', compact('item'));

    }


    public function edit(Item $item)
    {
        $subcategories = SubCategory::all();
        return view('admin.items.edit', compact('subcategories', 'item'));
    }


    public function update(UpdateItemRequest $request, Item $item)
    {
        if (!empty($request->file)){
            foreach (\request('file') as $file){
                $imageName = time().$file->getClientOriginalName();
                ItemImage::create(['item_id' => $item->id, 'image' => $imageName]);
                $file->move(public_path('images'), $imageName);
            }
        }
        $item->update($request->validated());
        return redirect()->route('admin.items.index');
    }


    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.items.index');
    }

    public function restore($id)
    {
        $item = Item::withTrashed()->where('id', $id)->get()->first();
        $item->deleted_at = null;
        $item->save();
        return redirect()->route('admin.items.index');
    }
}
