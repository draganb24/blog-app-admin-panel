<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/objave', [PostController::class, 'index'])->name('posts.index');
    Route::get('/objave/{slug}', [PostController::class, 'show'])->name('post.show');
    Route::get('uredi/objave/{slug}', [PostController::class, 'update'])->name('post.edit.form');
    Route::put('uredi/objave/{slug}', [PostController::class, 'update'])->name('post.update');
    Route::delete('obriši/objave/{slug}', [PostController::class, 'destroy'])->name('post.delete');
    Route::get('/nova-objava', function () {
        return view('posts.new-post');
    })->name('post.new');
});
