<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'calories_burned', 'steps', 'protein'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
