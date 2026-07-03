<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        $donors = Donor::all();
        return view('admin.donors.index', compact('donors'));
    }

    public function create()
    {
        return view('admin.donors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:donors,email',
            'blood_type' => 'required|string|max:5',
            'phone' => 'required|string|max:20',
            'city' => 'required|string',
            'last_donation_date' => 'nullable|date',
            'is_available' => 'required',
        ]);

        Donor::create($validated);
        return redirect()->route('admin.donors.index');
    }

    public function edit(Donor $donor)
    {
        return view('admin.donors.edit', compact('donor'));
    }

    public function update(Request $request, Donor $donor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:donors,email,' . $donor->id,
            'blood_type' => 'required|string|max:5',
            'phone' => 'required|string|max:20',
            'city' => 'required|string',
            'is_available' => 'required',
        ]);

        $donor->update($validated);
        return redirect()->route('admin.donors.index');
    }

    public function destroy(Donor $donor)
    {
        $donor->delete();
        return redirect()->route('admin.donors.index');
    }
}