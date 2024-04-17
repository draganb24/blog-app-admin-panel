<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

Route::post("login", [ApiController::class,"login"]);

Route::post("logout", [ApiController::class,"logout"]);
