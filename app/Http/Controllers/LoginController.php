<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

<<<<<<< HEAD

=======
>>>>>>> BackEnd
    public function login(Request $request)
    {
        $credentials = $request->validate([

            'email' => 'required|email:dns',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
<<<<<<< HEAD
=======

>>>>>>> BackEnd
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'Login Failed!');

        dd('berhasil login');
    }
}
