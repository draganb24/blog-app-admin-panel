<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/objave', function () {
    return view('posts');
});

Route::get('/nova-objava', function () {
    return view('new-post');
});

Route::get('/ulogujte-se', function () {
    return view('login');
});
