<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $fillable = [
        'patient_name',
        'age',
        'hospital',
        'city',
        'blood_type',
        'urgency',
        'status',
        'contact_phone',
    ];
}