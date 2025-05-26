<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FoodIntake;
use App\Models\ExerciseData;
use App\Models\History;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Pastikan middleware auth berfungsi
    }

public function index()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    // Ambil data makanan dan olahraga user saat ini
    $foodIntakes = FoodIntake::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
    $exerciseData = ExerciseData::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

    // Gabungkan data untuk ditampilkan di history
    $history = [];
    foreach ($foodIntakes as $food) {
        $history[] = [
            'date' => $food->created_at,
            'food_intake' => $food->food_name,
            'calories_consumed' => $food->calories,
            'exercise' => null,
            'calories_burned' => null,
        ];
    }

    foreach ($exerciseData as $exercise) {
        $history[] = [
            'date' => $exercise->created_at,
            'food_intake' => null,
            'calories_consumed' => null,
            'exercise' => $exercise->exercise_name,
            'calories_burned' => $exercise->calories,
        ];
    }

    // Urutkan berdasarkan tanggal
    usort($history, function ($a, $b) {
        return strtotime($b['date']) - strtotime($a['date']);
    });

    return view('history', compact('history'));
}


}
