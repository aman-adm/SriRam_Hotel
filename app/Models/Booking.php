<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    protected $fillable = [
        'user_id',
        'room_id',
        'name',
        'email',
        'phone',
        'start_date',
        'end_date',
        'check_in',
        'check_out',
        'adults',
        'children',
        'payment_method',
        'status',
    ];

        public function user()
{
    return $this->belongsTo(User::class);
}
       


}
