<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'name',
        'city',
        'address',
        'phone',
        'email',
        'is_active',
        'image',
    ];
}