<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/objave', [PostController::class, 'index']);

Route::get('/kategorije', [CategoryController::class, 'index']);

Route::get('/kategorije/{slug}', [CategoryController::class, 'index'])->name('category.show');

Route::get('/objave/{slug}', [PostController::class, 'show'])->name('post.show');

Route::get('/nova-objava', function () {
    return view('new-post');
});

Route::get('/ulogujte-se', function () {
    return view('login');
});
