<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodIntake extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'food_intake';

    protected $fillable = ['user_id', 'food_name', 'quantity', 'protein_content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
