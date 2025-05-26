<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan dashboard dengan data turnamen yang ada di session
    public function index()
    {
        return view('dashboard-admin');
    }

    // Menambah turnamen baru ke session
    public function createTournament(Request $request)
    {
        $tournaments = session('tournaments', []);
        
        // Tambahkan turnamen baru ke dalam session
        $tournaments[] = ['name' => $request->name];
        
        session(['tournaments' => $tournaments]);
        
        return redirect()->route('dashboard-admin');
    }

    // Mengupdate nama turnamen berdasarkan index
    public function updateTournament(Request $request, $index)
    {
        $tournaments = session('tournaments', []);
        
        // Update turnamen pada index yang sesuai
        if (isset($tournaments[$index])) {
            $tournaments[$index]['name'] = $request->name;
        }
        
        session(['tournaments' => $tournaments]);
        
        return redirect()->route('dashboard-admin');
    }

    // Menghapus turnamen berdasarkan index
    public function deleteTournament($index)
    {
        $tournaments = session('tournaments', []);
        
        // Hapus turnamen dari session
        if (isset($tournaments[$index])) {
            unset($tournaments[$index]);
        }

        // Re-index array setelah dihapus
        session(['tournaments' => array_values($tournaments)]);
        
        return redirect()->route('dashboard-admin');
    }
}
