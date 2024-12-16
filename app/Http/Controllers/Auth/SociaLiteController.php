<?php

namespace App\Http\Controllers\Auth;

use App\Models\User; // Pastikan model User sudah sesuai dengan struktur proyek Anda
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SociaLiteController extends Controller
{
    // Mengarahkan ke penyedia autentikasi
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback setelah autentikasi berhasil
    public function callback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();

            $registeredUser = User::where("google_id", $socialUser->id)->first();

            if (!$registeredUser) {
                $user = User::updateOrCreate(
                    [
                        'google_id' => $socialUser->id,
                    ],
                    [
                        'name' => $socialUser->name,
                        'email' => $socialUser->email,
                        'password' => Hash::make('123'),
                        'provider_token' => $socialUser->token,
                        'provider_refresh_token' => $socialUser->refreshToken ?? null,
                    ]
                );

                // Login user
                Auth::login($user);

                // Redirect ke dashboard
                return redirect('/dashboard');
            }

            // Login user
            Auth::login($registeredUser);

            // Redirect ke dashboard
            return redirect('/dashboard');
        } catch (\Exception $e) {
            // Tangani error dan redirect kembali ke halaman login dengan pesan error
            return redirect('/login')->with('error', 'Gagal login menggunakan Google.');
        }
    }
}
