<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/objave', [PostController::class, 'index']);

Route::get('/objave/{slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/nova-objava', function () {
    return view('posts.new-post');
});

Route::get('/kategorije', [CategoryController::class, 'index']);

Route::get('/kategorije/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/potkategorije', [SubcategoryController::class, 'index']);

Route::get('/potkategorije/{slug}', [SubcategoryController::class, 'show'])->name('subcategory.show');


Route::get('/ulogujte-se', function () {
    return view('login');
});
