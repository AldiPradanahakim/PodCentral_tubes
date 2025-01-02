<?php

use App\Http\Middleware\AuthLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('landingpage', ['title' => 'Landing Page']);
});

Route::get('/home', function(){
    return view('home.index');
})->middleware(AuthLogin::class);

Route::get('/profile', function () {
    return view('home.profile');
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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'regis']);
Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

Route::get('/profile', function () {
    return view('profile.index');
})->name('profile.index');

Route::get('/podcast', function () {
    return view('podcast.index');
})->name('podcast.index');

Route::get('/episode', function () {
    return view('episode.index');
})->name('episode.index');
