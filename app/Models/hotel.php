<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $fillable = ['room_type', 'price', 'capacity', 'available'];
}
