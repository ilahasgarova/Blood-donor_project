<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorRegistrationController extends Controller
{
    public function create()
    {
        return view('donor-ol');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ad'        => 'required|string|max:100',
            'soyad'     => 'required|string|max:100',
            'telefon'   => 'required|string|max:20',
            'email'     => 'required|email|unique:donors,email',
            'qan_grupu' => 'required|string|max:5',
            'seher'     => 'required|string|max:100',
        ]);

        Donor::create([
            'name'         => $validated['ad'] . ' ' . $validated['soyad'],
            'phone'        => $validated['telefon'],
            'email'        => $validated['email'],
            'blood_type'   => $validated['qan_grupu'],
            'city'         => $validated['seher'],
            'is_available' => true,
        ]);

        return redirect()->back()->with('success', 'Qeydiyyat uğurla tamamlandı! Tezliklə sizinlə əlaqə saxlanılacaq.');
    }
}