<?php

namespace App\Http\Controllers;

use App\Models\ItemImage;
use Illuminate\Http\Request;

class ItemImageController extends Controller
{
    public function destroy($id){
        $image = ItemImage::findOrFail($id);
        $image->delete();
        return back();
    }
}
