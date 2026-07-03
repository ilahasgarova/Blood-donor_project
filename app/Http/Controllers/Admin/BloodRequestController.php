<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    public function index()
    {
        $bloodRequests = BloodRequest::all();
        return view('admin.blood-requests.index', compact('bloodRequests'));
    }

    public function create()
    {
        return view('admin.blood-requests.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_name'  => 'required|string|max:255',
            'blood_type'    => 'required|string|max:5',
            'hospital_name' => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
        ]);

        BloodRequest::create($validated);
        return redirect()->route('admin.blood-requests.index');
    }

    public function edit(BloodRequest $bloodRequest)
    {
        return view('admin.blood-requests.edit', compact('bloodRequest'));
    }

    public function update(Request $request, BloodRequest $bloodRequest)
    {
        $validated = $request->validate([
            'patient_name'  => 'required|string|max:255',
            'blood_type'    => 'required|string|max:5',
            'hospital_name' => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
        ]);

        $bloodRequest->update($validated);
        return redirect()->route('admin.blood-requests.index');
    }

    public function destroy(BloodRequest $bloodRequest)
    {
        $bloodRequest->delete();
        return redirect()->route('admin.blood-requests.index');
    }
}