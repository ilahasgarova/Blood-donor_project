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
            'xeste_adi' => 'required|string',
            'xeste_yasi' => 'nullable|integer',
            'telefon' => 'required|string',
            'qan_grupu' => 'required|string',
            'tecillik' => 'required|string',
            'xestexana' => 'required|string',
            'seher' => 'required|string',
        ]);

        $urgencyMap = [
            'tecili' => 'critical',
            'orta' => 'urgent',
            'planli' => 'normal',
        ];

        BloodRequest::create([
            'patient_name' => $validated['xeste_adi'],
            'age' => $validated['xeste_yasi'],
            'hospital' => $validated['xestexana'],
            'city' => $validated['seher'],
            'blood_type' => $validated['qan_grupu'],
            'urgency' => $urgencyMap[$validated['tecillik']] ?? 'normal',
            'status' => 'open',
            'contact_phone' => $validated['telefon'],
            'units_needed' => 1,
        ]);

        return redirect()->back()->with('success', 'Qan tələbiniz uğurla göndərildi! Donorlarımız tezliklə sizinlə əlaqə saxlayacaq.');
    }
}