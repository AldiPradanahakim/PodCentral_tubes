<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\AuthLogin;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landingpage', ['title' => 'Landing Page']);
});

Route::get('/home', function(){
    return view('home.index');
})->middleware(AuthLogin::class);

Route::get('/podcast', function () {
    return view('podcast.index');
})->middleware(AuthLogin::class);

Route::get('/episode', function () {
    return view('episode.index');
})->middleware(AuthLogin::class);

Route::post('/logout', function () {
    Auth::logout(); // Fungsi untuk logout user
    return redirect('/'); // Redirect ke halaman landingpage setelah logout
})->name('logout');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/profile', function () {
    return view('home.profile');
})->middleware(AuthLogin::class);