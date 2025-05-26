<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    // UserDataController.php
    public function saveData(Request $request)
    {
        $request->validate([
            'calories_burned' => 'required|integer',
            'steps' => 'required|integer',
            'protein' => 'required|integer',
        ]);

        $user = Auth::user();

        // Simpan data ke model UserData
        UserData::updateOrCreate(
            ['user_id' => $user->id],
            [
                'calories_burned' => $request->calories_burned,
                'steps' => $request->steps,
                'protein' => $request->protein,
            ]
        );

        // Simpan ke History jika diperlukan
        History::create([
            'user_id' => $user->id,
            'data' => json_encode($request->all()),
        ]);

        return response()->json(['message' => 'Data saved successfully']);
    }

}
