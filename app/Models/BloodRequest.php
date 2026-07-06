<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{protected $fillable = [
    'patient_name', 
    'age', 
    'hospital', 
    'city', 
    'contact_phone', 
    'blood_type', 
    'units_needed', 
    'urgency', 
    'status', 
    'notes'
];
}