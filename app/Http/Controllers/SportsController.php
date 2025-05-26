<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function index()
    {
        // Logika untuk halaman Sports
        return view('sports');
    }
}
