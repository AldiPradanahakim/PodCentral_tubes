<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Menggunakan middleware 'web' untuk semua route di dalam grup ini
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
    Route::post('/signup', function (Request $request) {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Logika untuk menyimpan data pengguna (gunakan model User jika ada)
        // User::create([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => bcrypt($validated['password']),
        // ]);

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
        

    // Rute untuk menangani semua permintaan (SPA)
    Route::get('/{any}', function () {
        return view('home');
    })->where('any', '.*');
});
