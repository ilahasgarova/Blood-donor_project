<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalPublicController extends Controller
{
    /**
     * Bütün xəstəxanaların siyahısını göstərir.
     */
    public function publicIndex()
    {
        $hospitals = Hospital::all();
        return view('hospitals', compact('hospitals'));
    }

    /**
     * Konkret bir xəstəxananın məlumatlarını göstərir.
     */
    public function show($id)
    {
        $hospital = Hospital::findOrFail($id);
        return view('hospital-detail', compact('hospital'));
    }
}