<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use Carbon\Carbon;

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
            'name' => 'required|min:3',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20|confirmed',
        ]);
        
        User::create($validateData);
        $validateData['password'] = bcrypt($validateData['password']);
        // $validateData['created_at'] = Carbon::now('Asia/Jakarta');

        return redirect('/genre')->with('success', 'Registration Successful! Please select your genres.');
    }
}
