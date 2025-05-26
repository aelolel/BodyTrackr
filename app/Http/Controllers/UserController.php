<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Pastikan ini ada
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Menampilkan halaman Dashboard User (index)
    public function index()
    {
        return view('home');  // Sesuaikan dengan tampilan yang sesuai
    }

    // Menampilkan halaman pengaturan profil
    public function profileSettings()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();  // Menggunakan Auth untuk mengambil data user yang sedang login
        return view('profile-settings', compact('user'));
    }

    // Memperbarui data profil pengguna
    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',  // hanya validasi password jika diisi
        ], [
            'name.required' => 'Username is required.',
            'name.string' => 'Username must be a valid string.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'The email is already registered.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters long.',
        ]);
        
        // Update nama dan email
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password jika diubah
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile-settings')->with('success', 'Profile updated successfully!');
    }
}



