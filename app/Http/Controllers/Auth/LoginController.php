<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani proses login
    public function login(Request $request)
    {
        // Validasi kredensial
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Log kredensial untuk debugging
        \Log::info('Login Attempt:', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
    
        // Coba login
        if (Auth::attempt($credentials, $request->remember)) {
            // Log hasil login
            \Log::info('Login Success:', [
                'email' => Auth::user()->email,
            ]);
    
            // Jika login berhasil, arahkan ke dashboard sesuai dengan peran pengguna
            if (Auth::user()->email === 'admin@example.com') {
                return redirect()->route('dashboard-admin');
            }
    
            return redirect()->route('home');
        }
    
        // Jika login gagal, tampilkan error
        \Log::warning('Login failed for email: ' . $request->email);
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Menangani proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
