<?php

use App\Http\Middleware\AuthLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManagerPodcastController;

// Halaman landing (route pertama)
Route::get('/', function () {
    return view('landingpage', ['title' => 'Landing Page']);
});

// Pencarian
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Halaman utama setelah login, menggunakan middleware AuthLogin
Route::get('/home', [HomeController::class, 'index'])
    ->name('home.index')
    ->middleware(AuthLogin::class);

// Halaman profile setelah login
Route::get('/profile', function () {
    return view('home.profile');
})->middleware(AuthLogin::class);

// Logout user
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Login dan Register routes
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'regis']);

// Halaman koleksi setelah login
Route::get('/koleksi', [KoleksiController::class, 'index'])
    ->middleware(AuthLogin::class);

// Halaman history
Route::get('/history', [HistoryController::class, 'index'])
    ->name('history.index');

// Halaman detail podcast (single podcast)
Route::get('/podcast/{podcast}', [PodcastController::class, 'show'])
    ->name('podcast.show');

// Halaman semua podcast
Route::get('/podcasts/author/{author}', [PodcastController::class, 'index'])->name('podcasts.author')
    ->middleware(AuthLogin::class);


// Halaman genre
Route::get('/genre', function () {
    return view('genre.index');
});

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(AuthLogin::class);

// Rute untuk mengelola podcast di dashboard
Route::prefix('dashboard/managepodcast')
    ->middleware(AuthLogin::class)
    ->group(function () {
        Route::get('/', [ManagerPodcastController::class, 'index'])
            ->name('dashboard.managepodcast.index');
        // Route tambahan untuk create, edit podcast bisa ditambahkan di sini
    });

// Rute untuk halaman Pengguna di dashboard
Route::prefix('dashboard/pengguna')
    ->middleware(AuthLogin::class)
    ->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])
            ->name('dashboard.pengguna.index');
        // Route tambahan untuk create, edit pengguna bisa ditambahkan di sini
    });
