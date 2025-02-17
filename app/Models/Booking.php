<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'owner_id',
        'dog_id',
        'kennel_id',
        'booking_start',
        'booking_end'
    ];
}
