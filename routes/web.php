<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['title' => 'Homepage']);
});
Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
});