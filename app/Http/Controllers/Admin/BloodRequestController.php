<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    public function index() {
        $bloodRequests = BloodRequest::latest()->get();
        return view('admin.blood-requests.index', compact('bloodRequests'));
    }

    // BAX BURA: Əgər bu funksiya burada yoxdursa, xəta alacaqsan!
    public function create() {
        return view('admin.blood-requests.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'patient_name'  => 'required',
            'units_needed'  => 'required|integer',
            'hospital'      => 'required',
            'city'          => 'required',
            'contact_phone' => 'required',
            'blood_type'    => 'required',
            'urgency'       => 'required',
            'status'        => 'required',
        ]);
        
        BloodRequest::create($request->all());
        return redirect()->route('admin.blood-requests.index')->with('success', 'Uğurla əlavə edildi!');
    }

    public function edit($id) {
        $bloodRequest = BloodRequest::findOrFail($id);
        return view('admin.blood-requests.edit', compact('bloodRequest'));
    }

    public function update(Request $request, $id) {
        $bloodRequest = BloodRequest::findOrFail($id);
        $bloodRequest->update($request->all());
        return redirect()->route('admin.blood-requests.index')->with('success', 'Uğurla yeniləndi!');
    }
}