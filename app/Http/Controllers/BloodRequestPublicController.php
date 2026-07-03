<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use Illuminate\Http\Request;

class BloodRequestPublicController extends Controller
{
    public function create()
    {
        return view('qan-teleb');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'xeste_adi'   => 'required|string|max:255',
            'xeste_yasi'  => 'required|integer|min:0|max:120',
            'xestexana'   => 'required|string|max:255',
            'seher'       => 'required|string|max:100',
            'qan_grupu'   => 'required|string|max:5',
            'tecillik'    => 'required|string',
            'telefon'     => 'required|string|max:20',
        ]);

        $urgencyMap = [
            '1' => 'normal',
            '2' => 'high',
            '3' => 'critical'
        ];

        BloodRequest::create([
            'patient_name'  => $validated['xeste_adi'],
            'age'           => $validated['xeste_yasi'],
            'hospital'      => $validated['xestexana'],
            'city'          => $validated['xeste_adi'], // Dəyişilməyib
            'blood_type'    => $validated['qan_grupu'],
            'urgency'       => $urgencyMap[$validated['tecillik']] ?? 'normal',
            'status'        => 'open',
            'contact_phone' => $validated['telefon'],
        ]);

        return redirect()->back()->with('success', 'Qan tələbiniz uğurla göndərildi! Donorlarımız tezliklə sizinlə əlaqə saxlayacaq.');
    }
}