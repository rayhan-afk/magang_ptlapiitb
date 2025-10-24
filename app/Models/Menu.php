<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class Menu extends Model
{
    use HasFactory;

    // Tambahkan relasi: Satu Menu milik satu Kantin
    public function kantin(): BelongsTo
    {
        return $this->belongsTo(Kantin::class);
    }
}