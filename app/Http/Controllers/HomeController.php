<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Donation;

class HomeController extends Controller
{
    public function index()
    {
        $totalDonors = Donor::where('is_available', true)->count();
        $totalDonations = Donation::where('status', 'completed')->count();
        $totalCities = Donor::distinct('city')->count('city');
        $savedLives = $totalDonations * 3;

        $bloodGroups = Donor::select('blood_type')
            ->selectRaw('count(*) as total')
            ->groupBy('blood_type')
            ->get()
            ->keyBy('blood_type');

        return view('index', compact(
            'totalDonors',
            'totalDonations',
            'totalCities',
            'savedLives',
            'bloodGroups'
        ));
    }
}
