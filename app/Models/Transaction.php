<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'type',
        'category',
        'notes',
        'created_at',
        'updated_at',
    ];

    // Tambahkan atribut yang perlu di-cast sebagai tipe data tertentu
    protected $casts = [
        'amount' => 'float',
    ];
}

