<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'email',
        'blood_type',
        'city',
        'is_available',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
