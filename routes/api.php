<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubcategoryController;

Route::post('/login', [ApiController::class, 'login'])->name('login.api');

Route::post("/logout", [ApiController::class,"logout"])->name('logout.api');

Route::apiResource('/kategorije', CategoryController::class);
Route::post('/kategorije', [CategoryController::class, 'store'])->name('categories.store');

Route::apiResource('/potkategorije', SubcategoryController::class);
Route::post('/potkategorije', [SubcategoryController::class, 'store'])->name('subcategories.store');

Route::apiResource('/fotografije', ImageController::class);
Route::put('/api/fotografije/{image}', [ImageController::class, 'update']);

Route::apiResource('/objave', PostController::class);
Route::post('/objave', [PostController::class, 'store'])->name('posts.store');

Route::apiResource('/dokumenti', DocumentController::class);
Route::put('/api/dokumenti/{document}', [DocumentController::class, 'update']);





