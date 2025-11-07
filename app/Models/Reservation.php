<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'treatment_type',
        'reservation_date',
        'reservation_time',
        'queue_number',
        'status'
    ];

    protected $casts = [
        'reservation_date' => 'date',
    ];
}