<?php


use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SociaLiteController;




// Redirect ke penyedia autentikasi
Route::get('auth/redirect', [SociaLiteController::class, 'redirect'])->name('auth.redirect');

// Callback setelah login berhasil
Route::get('auth/google/callback', [SociaLiteController::class, 'callback'])->name('auth.callback');

// Middleware untuk rute dengan web
Route::middleware('web')->group(function () {
    // Rute untuk login
    Route::get('/login', function () {
        return view('login');
    })->name('login');

    // Rute untuk signup (GET)
    Route::get('/signup', function () {
        return view('signup');
    })->name('signup');

    // Rute untuk signup (POST)
    Route::post('/signup', function (\Illuminate\Http\Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Simpan data pengguna ke database
        \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Redirect ke halaman genre dengan pesan sukses
        return redirect()->route('genre')->with('success', 'Account created successfully!');
    });

    // Rute untuk genre
    Route::get('/genre', function () {
        return view('genre');
    })->name('genre');

    // Rute untuk halaman utama
    Route::get('/halamanutama', function () {
        return view('halamanutama');
    })->name('halamanutama');

    // SPA fallback route
    Route::get('/{any}', function () {
        return view('home');
    })->where('any', '.*');
});


//Rute untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');