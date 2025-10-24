<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany

class Kantin extends Model
{
    use HasFactory;

    // Tambahkan relasi: Satu Kantin punya banyak Menu
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    // (Opsional) Jika Anda ingin relasi ke User (Pengelola)
    // public function pengelola()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}