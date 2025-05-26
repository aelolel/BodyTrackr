<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history'; // Tentukan nama tabel secara eksplisit
    protected $fillable = ['user_id', 'data']; // Tambahkan kolom yang bisa diisi
}
