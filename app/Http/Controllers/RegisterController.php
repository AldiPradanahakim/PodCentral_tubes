<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        User::create($validateData);


        return redirect('/genre')->with('success', 'Registration Successful! Please select your genres.');
    }
}
