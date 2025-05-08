<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's naming convention)
    protected $table = 'blogs';

    // Define the fillable attributes (columns that can be mass-assigned)
    protected $fillable = [
        'title',
        'description',
        'image',
    ];

    // Optionally, define any relationships or methods as needed
}
