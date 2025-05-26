<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        // Jika pengguna sudah login, arahkan ke dashboard sesuai dengan perannya
        if (Auth::check()) {
            return redirect()->route(Auth::user()->role === 'admin' ? 'dashboard-admin' : 'dashboard-user');
        }

        return $next($request);
    }
}
