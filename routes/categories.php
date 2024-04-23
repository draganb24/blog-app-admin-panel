<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/kategorije', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/kategorije/{slug}', [CategoryController::class, 'show'])->name('category.show');
    Route::get('uredi/kategorije/{slug}', [CategoryController::class, 'update'])->name('category.edit.form');
    Route::put('uredi/kategorije/{slug}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('obriši/kategorije/{slug}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('/nova-kategorija', function () {
        return view('categories.new-category');
    })->name('category.new');
});
