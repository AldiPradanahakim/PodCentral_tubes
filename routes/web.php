<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('landingpage', ['title' => 'Landing Page']);
});

Route::get('/podcast', function () {
    return view('podcast.index');
});

Route::get('/episode', function () {
    return view('episode.index');
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'regis']);

Route::get('/home', [HomeController::class, 'index']);