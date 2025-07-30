<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    protected $fillable = [
        'car_id',
        'user_id',
        'car_km',
        'end_date',
    ];
    //
}
