<?php

use App\Http\Middleware\AuthLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ManagerGenreController;
use App\Http\Controllers\ManagerPodcastController;
use App\Http\Controllers\PDFReportController;



// Landing page
// In web.php, you should have something like:
Route::get('/', [LandingPageController::class, 'index']);

// Rute login dan register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'regis']);

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'You have been logged out.');
})->name('logout');

// Halaman utama setelah login
Route::middleware([AuthLogin::class])->group(function () {
    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

// Podcast
Route::get('/podcast/{podcast}', [PodcastController::class, 'show'])->name('podcast.show');
Route::get('/podcasts/author/{author}', [PodcastController::class, 'index'])
    ->name('podcasts.author')
    ->middleware(AuthLogin::class);
Route::post('/podcasts/{podcast}/history', [PodcastController::class, 'addToHistory'])->name('podcasts.addToHistory');
Route::post('/podcasts/{podcast}/koleksi', [PodcastController::class, 'addToKoleksi'])->name('podcasts.addToKoleksi');
Route::get('/podcasts', [PodcastController::class, 'list'])->name('podcasts.list');
Route::get('/podcasts/user', [PodcastController::class, 'userPodcasts'])->name('podcasts.user');


// Dashboard (Admin only)
Route::middleware(['auth', AdminMiddleware::class])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Manage Podcasts
    Route::prefix('managepodcast')->group(function () {
        Route::get('/', [ManagerPodcastController::class, 'index'])->name('dashboard.managepodcast.index');
        Route::post('/', [ManagerPodcastController::class, 'store'])->name('dashboard.managepodcast.store');
        Route::get('/create', [ManagerPodcastController::class, 'create'])->name('dashboard.managepodcast.create');
        Route::get('/{podcast}/edit', [ManagerPodcastController::class, 'edit'])->name('dashboard.managepodcast.edit');
        Route::put('/{podcast}', [ManagerPodcastController::class, 'update'])->name('dashboard.managepodcast.update');
        Route::delete('/{podcast}', [ManagerPodcastController::class, 'destroy'])->name('dashboard.managepodcast.destroy');
    });

    // Manage Pengguna
    Route::prefix('pengguna')->group(function () {
        Route::get('/', [PenggunaController::class, 'index'])->name('dashboard.pengguna.index');
        Route::get('/{user}', [PenggunaController::class, 'show'])->name('dashboard.pengguna.show');
        Route::delete('/{user}', [PenggunaController::class, 'destroy'])->name('dashboard.pengguna.destroy');
    });

    // Manage Genre
    Route::prefix('managegenre')->group(function () {
        Route::get('/', [ManagerGenreController::class, 'index'])->name('dashboard.managegenre.index');
        Route::get('/create', [ManagerGenreController::class, 'create'])->name('dashboard.managegenre.create');
        Route::post('/', [ManagerGenreController::class, 'store'])->name('dashboard.managegenre.store');
        Route::get('/{genre}/edit', [ManagerGenreController::class, 'edit'])->name('dashboard.managegenre.edit');
        Route::put('/{genre}', [ManagerGenreController::class, 'update'])->name('dashboard.managegenre.update');
        Route::delete('/{genre}', [ManagerGenreController::class, 'destroy'])->name('dashboard.managegenre.destroy');
    });
    Route::get('/download-pdf', [PDFReportController::class, 'generateDashboardReport'])->name('dashboard.pdf');
});


// Halaman profile setelah login
Route::get('/profile', [ProfileController::class, 'show'])
    ->name('profile')
    ->middleware(AuthLogin::class);
Route::post('/profile/update-picture', [ProfileController::class, 'updateProfilePicture'])
    ->name('profile.update-picture')
    ->middleware(AuthLogin::class);
Route::post('/profile/delete-picture', [ProfileController::class, 'deleteProfilePicture'])
    ->name('profile.delete-picture')
    ->middleware(AuthLogin::class);
