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
use App\Http\Controllers\ManagerGenreController;
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

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')
    ->middleware(AuthLogin::class);

// Rute untuk mengelola podcast di dashboard
Route::prefix('dashboard/managepodcast')
    ->middleware(AuthLogin::class)
    ->group(function () {
        Route::get('/', [ManagerPodcastController::class, 'index'])
            ->name('dashboard.managepodcast.index');
        Route::post('/', [ManagerPodcastController::class, 'store'])->name('dashboard.managepodcast.store');
        Route::get('/create', [ManagerPodcastController::class, 'create'])->name('dashboard.managepodcast.create');
        Route::get('/{podcast}/edit', [ManagerPodcastController::class, 'edit'])->name('dashboard.managepodcast.edit');
        Route::put('/{podcast}', [ManagerPodcastController::class, 'update'])->name('dashboard.managepodcast.update');
        Route::delete('/{podcast}', [ManagerPodcastController::class, 'destroy'])->name('dashboard.managepodcast.destroy');
    });

// Rute untuk halaman Pengguna di dashboard
Route::prefix('dashboard/pengguna')
    ->middleware(AuthLogin::class)
    ->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])
            ->name('dashboard.pengguna.index');
        Route::get('/{user}', [PenggunaController::class, 'show'])->name('dashboard.pengguna.show');
        Route::delete('/{user}', [PenggunaController::class, 'destroy'])->name('dashboard.pengguna.destroy');
    });

// Rute untuk mengelola genre di dashboard
Route::prefix('dashboard/managegenre')
    ->middleware(AuthLogin::class)
    ->group(function () {
        Route::get('/', [ManagerGenreController::class, 'index'])->name('dashboard.managegenre.index');
        Route::get('/create', [ManagerGenreController::class, 'create'])->name('dashboard.managegenre.create');
        Route::post('/', [ManagerGenreController::class, 'store'])->name('dashboard.managegenre.store');
        Route::get('/{genre}/edit', [ManagerGenreController::class, 'edit'])->name('dashboard.managegenre.edit');
        Route::put('/{genre}', [ManagerGenreController::class, 'update'])->name('dashboard.managegenre.update');
        Route::delete('/{genre}', [ManagerGenreController::class, 'destroy'])->name('dashboard.managegenre.destroy');
    });
