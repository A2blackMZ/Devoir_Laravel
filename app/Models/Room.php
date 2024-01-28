<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_name',
        'description',
        'room_name',
        'price',
        'bed_numbers',
        'adult_max',
        'kid_max',
        'features',
        'status'
    ];

    // attributs JSON
    protected $casts = [
        'features' => 'array', // Utilisez 'array' au lieu de 'json'
    ];
}
