<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        // Cek apakah user sudah login dan apakah perannya adalah admin
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
