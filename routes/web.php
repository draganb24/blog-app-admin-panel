<?php

use App\Http\Controllers\UploadController;
use App\Models\CurrentlyLoggedInUser;
use Illuminate\Support\Facades\Route;

Route::get('/ulogujte-se', function () {
    $loggedInUsersCount = CurrentlyLoggedInUser::count();

    if ($loggedInUsersCount > 0) {
        return redirect()->route('posts.index');
    }

    return view('login');
})->name('login');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/odjavi-se', function () {
    return view('login');
})->name('logout');

Route::post('upload', [UploadController::class, 'store']);
