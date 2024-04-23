<?php

use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/ulogujte-se', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('login');
});

Route::get('/odjavi-se', function () {
    return view('login');
})->name('logout');

Route::post('upload', [UploadController::class, 'store']);
