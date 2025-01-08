<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.pengguna.index', compact('users'));
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.pengguna.index')->with('success', 'User deleted successfully');
    }
}
