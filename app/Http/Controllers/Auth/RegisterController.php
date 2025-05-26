<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Pastikan form registrasi ada
    }

    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        // Validasi data yang diterima dari form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Pastikan email unik
            'password' => 'required|string|min:8|confirmed', // Konfirmasi password
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data pengguna ke database



        if (User::where('email', $request->email)->exists()) {
            return back()->withErrors([
                'email' => 'Email is already in use.',
            ]);
        }
    
        // Check if name already exists
        if (User::where('name', $request->name)->exists()) {
            return back()->withErrors([
                'name' => 'Name is already in use.',
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Pastikan password ter-hash
            'role' => 'user', // Role default untuk user
        ]);

        // Setelah registrasi berhasil, arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
    }
}
