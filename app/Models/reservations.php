<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    protected $fillable = [
        'car_id',
        'user_id',
        'start_date',
        'end_date',
    ];
}
