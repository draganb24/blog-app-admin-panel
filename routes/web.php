<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/ulogujte-se', function () {
    return view('login');
})->name('login');

Route::middleware('admin')->group(function () {
    Route::get('/objave', [PostController::class, 'index'])->name('posts.index');
    Route::get('/objave/{slug}', [PostController::class, 'show'])->name('post.show');
    Route::get('uredi/objave/{slug}', [PostController::class, 'update'])->name('post.edit.form');
    Route::put('uredi/objave/{slug}', [PostController::class, 'update'])->name('post.update');
    Route::delete('obriši/objave/{slug}', [PostController::class, 'destroy'])->name('post.delete');
    Route::get('/nova-objava', function () {
        return view('posts.new-post');
    })->name('post.new');

    Route::get('/kategorije', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/kategorije/{slug}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('uredi/kategorije/{slug}', [CategoryController::class, 'update'])->name('category.edit.form');
    Route::put('uredi/kategorije/{slug}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('obriši/kategorije/{slug}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/nova-kategorija', function () {
        return view('categories.new-category');
    })->name('category.new');

    Route::get('/potkategorije', [SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/potkategorije/{slug}', [SubcategoryController::class, 'show'])->name('subcategory.show');
    Route::get('uredi/potkategorije/{slug}', [SubcategoryController::class, 'update'])->name('subcategory.edit.form');
    Route::put('uredi/potkategorije/{slug}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::delete('obriši/potkategorije/{slug}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');
    Route::get('/nova-potkategorija', function () {
        return view('subcategories.new-subcategory');
    })->name('subcategory.new');
});

Route::get('/odjavi-se', function () {
})->name('logout');

Route::post('upload', [UploadController::class, 'store']);
