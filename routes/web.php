<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UploadController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/objave', [PostController::class, 'index'])->name('posts.index');

Route::get('/objave/{slug}', [PostController::class, 'show'])->name('post.show');

Route::get('uredi/objave/{slug}', [PostController::class, 'update'])->name('post.edit.form');

Route::put('uredi/objave/{slug}', [PostController::class, 'update'])->name('post.update');


Route::get('/nova-objava', function () {
    return view('posts.new-post');
});

Route::post('upload', [UploadController::class, 'store']);


Route::get('/kategorije', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/kategorije/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('uredi/kategorije/{slug}', [CategoryController::class, 'update'])->name('category.edit.form');

Route::put('uredi/kategorije/{slug}', [CategoryController::class, 'update'])->name('category.update');


Route::get('/potkategorije', [SubcategoryController::class, 'index']);

Route::get('/potkategorije/{slug}', [SubcategoryController::class, 'show'])->name('subcategory.show');

Route::get('uredi/potkategorije/{slug}', [SubcategoryController::class, 'update'])->name('subcategory.edit.form');

Route::put('uredi/potkategorije/{slug}', [SubcategoryController::class, 'update'])->name('subcategory.update');

Route::get('/ulogujte-se', function () {
    return view('login');
});
