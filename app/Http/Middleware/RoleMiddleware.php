<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // Cek apakah user sudah login dan role-nya sesuai
        if (Auth::check() && Auth::user()->role !== $role) {
            return redirect('/');
        }

        return $next($request);
    }
}
