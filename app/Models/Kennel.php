<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kennel extends Model
{
    protected $fillable = [
        'kennel_size',
        'kennel_type'
    ];
}
