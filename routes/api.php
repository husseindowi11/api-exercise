<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('categories', CategoryController::class);

Route::get('/categories', [CategoryController::class,'index']);
Route::post('/categories',[CategoryController::class,'show']);

Route::get('/subcategories', [SubCategoryController::class,'index']);
Route::post('/subcategories',[SubCategoryController::class,'show']);

Route::get('/items', [ItemController::class,'index']);
Route::post('/items',[ItemController::class,'show']);


Route::post('/wishlist/', [WishlistController::class,'index']);
Route::post('/wishlist/store', [WishlistController::class,'store']);
Route::post('/wishlist/delete', [WishlistController::class,'delete']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
