<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/objave', [PostController::class, 'index']);

Route::get('/objave/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/nova-objava', function () {
    return view('new-post');
});

Route::get('/ulogujte-se', function () {
    return view('login');
});
