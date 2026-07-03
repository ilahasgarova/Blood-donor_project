<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;

class DonorListController extends Controller
{
    public function index(Request $request)
    {
        $query = Donor::where('is_available', true);

        if ($request->blood_type) {
            $query->where('blood_type', $request->blood_type);
        }

        if ($request->city) {
            $query->where('city', $request->city);
        }

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $donors = $query->get();
        $cities = Donor::distinct('city')->pluck('city');

        return view('donorlar', compact('donors', 'cities'));
    }
}
