<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in.');
        }

        if (Auth::user()->Role_id !== 1) {
            return redirect()->route('home.index')->with('error', 'Unauthorized access. Admin only.');
        }

        return $next($request);
    }
}
