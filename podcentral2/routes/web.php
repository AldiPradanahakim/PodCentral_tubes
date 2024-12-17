<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('landingpage', ['title' => 'Landing Page']);
});

Route::get('/home', function () {
    return view('home.index');
});

Route::get('/podcast', function () {
    return view('podcast.index');
});

Route::get('/episode', function () {
    return view('episode.index');
});


Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
