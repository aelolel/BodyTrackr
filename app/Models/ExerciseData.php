<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseData extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'exercise_data'; // Pastikan ini sesuai dengan nama tabel Anda

    protected $fillable = ['user_id', 'exercise_name', 'duration', 'calories_burned'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
