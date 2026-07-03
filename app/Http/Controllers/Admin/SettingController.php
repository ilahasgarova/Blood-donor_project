<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   
    public function index()
    {
        return view('admin.settings.index');
    }

    // Formadan gələn məlumatları qəbul etmək üçün
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name'    => 'required|string|max:255',
            'contact_email'=> 'required|email',
            'phone'        => 'required|string|max:20',
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Ayarlar uğurla yeniləndi!');
    }
}