<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodInventory;
use Illuminate\Http\Request;

class BloodInventoryController extends Controller
{
    public function index()
    {
        $inventories = BloodInventory::all();
        return view('admin.blood-inventory.index', compact('inventories'));
    }

    public function create()
    {
        return view('admin.blood-inventory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'blood_type' => 'required|string|max:5',
            'units_available' => 'required|integer|min:0',
            'status' => 'required|string',
            'hospital' => 'nullable|string',
            'city' => 'nullable|string',
        ]);

        BloodInventory::create($validated);
        return redirect()->route('admin.blood-inventory.index');
    }

    public function edit(BloodInventory $bloodInventory)
    {
        return view('admin.blood-inventory.edit', compact('bloodInventory'));
    }

    public function update(Request $request, BloodInventory $bloodInventory)
    {
        $validated = $request->validate([
            'blood_type' => 'required|string|max:5',
            'units_available' => 'required|integer|min:0',
            'status' => 'required|string',
            'hospital' => 'nullable|string',
            'city' => 'nullable|string',
        ]);

        $bloodInventory->update($validated);
        return redirect()->route('admin.blood-inventory.index');
    }

    public function destroy(BloodInventory $bloodInventory)
    {
        $bloodInventory->delete();
        return redirect()->route('admin.blood-inventory.index');
    }
}