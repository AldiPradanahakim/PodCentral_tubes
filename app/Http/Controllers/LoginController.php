<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function login(Request $request)
    {
        // Validasi input dari pengguna
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial menggunakan Auth::attempt()
        if (Auth::attempt($credentials)) {
            // Regenerasi session jika login berhasil
            $request->session()->regenerate();

            // Ambil data user yang sedang login
            $user = Auth::user();

            // Debug untuk melihat nilai role_id
            \Log::info('User Role ID: ' . $user->Role_id); // Perhatikan kapitalisasi 'Role_id'

            // Cek role_id untuk menentukan redirect (perhatikan kapitalisasi 'Role_id')
            if ($user->Role_id === 1) {  // Gunakan === untuk comparison yang lebih strict
                // Jika Role_id adalah 1 (Admin), redirect ke halaman dashboard
                return redirect()->intended(route('dashboard'));
            } else {
                // Jika Role_id bukan 1 (User), redirect ke halaman profile
                return redirect()->intended(route('home.index'));
            }
        }

        // Jika login gagal
        return back()
            ->withInput()
            ->with('loginError', 'Email atau password salah.');
    }
}
