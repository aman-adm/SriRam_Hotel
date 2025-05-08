<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['text_color', 'base_color'];
}
