<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function index(Request $request)
    {

        $wishlist = Wishlist::with('item.sub_category.category')->where('user_id', $request->id)->get();
        return $wishlist;
    }

    public function store(Request $request)
    {

        $wishlist = Wishlist::where('user_id', $request->user_id)
            ->where('item_id', $request->item_id)->get();
        if ($wishlist->count() > 0){
            return response('already in wishlist');
        }

        Wishlist::create(['user_id' => $request->user_id, 'item_id' => $request->item_id]);
        return response('success','200');
    }

    public function delete(Request $request)
    {
        $wishlist = Wishlist::findOrFail($request->wishlist_item_id);
        $wishlist->delete();
        return response('success','200');
    }


}
