<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubcategoryController;

Route::post("login", [ApiController::class,"login"]);

Route::post("logout", [ApiController::class,"logout"]);

Route::apiResource('/kategorije', CategoryController::class);

Route::apiResource('/potkategorije', SubcategoryController::class);

Route::apiResource('/fotografije', ImageController::class);

Route::apiResource('/objave', PostController::class);

Route::apiResource('/dokumenti', DocumentController::class);




