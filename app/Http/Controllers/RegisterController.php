<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function regis(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20|confirmed',
        ]);

        // Enkripsi password sebelum membuat user
        $validateData['password'] = bcrypt($validateData['password']);

        // Menambahkan role_id dengan default role 2 (user)
        $validateData['role_id'] = 2;
        // dd($validateData);

        // Membuat user baru
        User::create($validateData);

        return redirect('/login')->with('success', 'Registration Successful! Please login to continue.');
    }
}
