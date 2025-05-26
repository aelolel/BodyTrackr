<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FoodIntake;
use App\Models\ExerciseData;
use App\Models\UserData;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman home dengan data total protein, kalori terbakar, dan langkah kaki.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Jumlah total protein yang dikonsumsi user hari ini
        $totalProtein = FoodIntake::where('user_id', $user->id)
            ->whereDate('created_at', now()->toDateString())
            ->sum('protein_content');

        // Jumlah total kalori yang terbakar user hari ini
        $totalCaloriesBurned = ExerciseData::where('user_id', $user->id)
            ->whereDate('created_at', now()->toDateString())
            ->sum('calories_burned');

        // Ambil jumlah langkah kaki user dari data manual
        $steps = UserData::where('user_id', $user->id)
            ->whereDate('created_at', now()->toDateString())
            ->value('steps');

        // Jika langkah tidak ada, set default 0
        if (!$steps) {
            $steps = 0;
        }

        // Kirim data ke view home
        return view('home', [
            'totalProtein' => $totalProtein,
            'totalCaloriesBurned' => $totalCaloriesBurned,
            'steps' => $steps,
        ]);
    }
}
