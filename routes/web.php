<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
            Route::post('/category/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
            Route::post('/subcategory/restore/{id}', [SubCategoryController::class, 'restore'])->name('subcategories.restore');
            Route::post('/item/restore/{id}', [\App\Http\Controllers\ItemController::class, 'restore'])->name('items.restore');
            Route::resource('items', \App\Http\Controllers\ItemController::class);
            Route::resource('categories', \App\Http\Controllers\CategoryController::class);
            Route::resource('item-image', \App\Http\Controllers\ItemImageController::class);
            Route::resource('subcategories', \App\Http\Controllers\SubCategoryController::class);

        });
    });
});

