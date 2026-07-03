<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donor_id',
        'hospital',
        'city',
        'blood_type',
        'units_donated',
        'donation_date',
        'status',
        'notes',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
