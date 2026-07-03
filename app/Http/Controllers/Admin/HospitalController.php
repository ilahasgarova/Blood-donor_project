<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        return view('admin.hospitals.index', compact('hospitals'));
    }

    public function create()
    {
        return view('admin.hospitals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/hospitals'), $imageName);
            $data['image'] = 'uploads/hospitals/' . $imageName;
        }

        Hospital::create($data);
        return redirect()->route('admin.hospitals.index');
    }

    public function edit(Hospital $hospital)
    {
        return view('admin.hospitals.edit', compact('hospital'));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/hospitals'), $imageName);
            $data['image'] = 'uploads/hospitals/' . $imageName;
        }

        $hospital->update($data);
        return redirect()->route('admin.hospitals.index');
    }

    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return redirect()->route('admin.hospitals.index');
    }
}