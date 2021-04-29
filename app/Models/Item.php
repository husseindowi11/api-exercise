<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    public $guarded =[''];

    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }

    public function images(){
        return $this->hasMany(ItemImage::class);
    }
}
