<?php

use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->group(function () {
    Route::get('/potkategorije', [SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/potkategorije/{slug}', [SubcategoryController::class, 'show'])->name('subcategory.show');
    Route::get('uredi/potkategorije/{slug}', [SubcategoryController::class, 'update'])->name('subcategory.edit.form');
    Route::put('uredi/potkategorije/{slug}', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::delete('obriši/potkategorije/{slug}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');
    Route::get('/nova-potkategorija', function () {
        return view('subcategories.new-subcategory');
    })->name('subcategory.new');
});
