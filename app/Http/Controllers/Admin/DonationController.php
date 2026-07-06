<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::with('donor')->latest()->get();
        return view('admin.donations.index', compact('donations'));
    }

    public function create()
    {
        $donors = Donor::all();
        return view('admin.donations.create', compact('donors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'donor_id'      => 'required|exists:donors,id',
            'hospital'      => 'required|string',
            'city'          => 'required|string',
            'blood_type'    => 'required|string',
            'units_donated' => 'required|integer|min:1',
            'donation_date' => 'required|date',
            'status'        => 'required|string',
            'notes'         => 'nullable|string',
        ]);

        Donation::create($validated);

        return redirect()->route('admin.donations.index')->with('success', 'Bağış uğurla əlavə edildi!');
    }

    public function edit(Donation $donation)
    {
        $donors = Donor::all();
        return view('admin.donations.edit', compact('donation', 'donors'));
    }

    public function update(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'donor_id'      => 'required|exists:donors,id',
            'hospital'      => 'required|string',
            'city'          => 'required|string',
            'blood_type'    => 'required|string',
            'units_donated' => 'required|integer|min:1',
            'donation_date' => 'required|date',
            'status'        => 'required|string',
            'notes'         => 'nullable|string',
        ]);

        $donation->update($validated);

        return redirect()->route('admin.donations.index')->with('success', 'Məlumat uğurla yeniləndi!');
    }
}