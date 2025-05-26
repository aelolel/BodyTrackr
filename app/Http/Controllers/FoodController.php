<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
// FoodController.php
public function store(Request $request)
{
    $request->validate([
        'food_name' => 'required|string',
        'quantity' => 'required|integer',
        'protein_content' => 'required|numeric',
    ]);
    FoodIntake::create([
        'user_id' => Auth::id(),
        'food_name' => $request->food_name,
        'quantity' => $request->quantity,
        'protein_content' => $request->protein_content,
    ]);
    return redirect()->back()->with('success', 'Food added successfully');
}

    public function update(Request $request, $id)
    {
        $food = FoodIntake::findOrFail($id);
        $food->update($request->all());

        return redirect()->back()->with('success', 'Food updated successfully');
    }

    public function destroy($id)
    {
        FoodIntake::destroy($id);
        return redirect()->back()->with('success', 'Food deleted successfully');
    }
   
    // FoodController.php
   public function index()
   {
       // Kode untuk menampilkan halaman food
       return view('food');
   }
}
