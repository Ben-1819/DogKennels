<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    protected $fillable = [
        'owner_id',
        'name',
        'breed',
        'size',
        'age',
        'training_level',
        'temperment',
        'extra_info',
        'feed_per_day'
    ];
}
