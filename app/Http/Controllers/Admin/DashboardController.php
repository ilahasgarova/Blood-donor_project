<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\BloodRequest;
use App\Models\Donation;
use App\Models\Hospital;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDonors = Donor::count();
        $totalRequests = BloodRequest::count();
        $openRequests = BloodRequest::where('status', 'open')->count();
        $totalDonations = Donation::count();
        $totalHospitals = Hospital::count();

        return view('admin.dashboard', compact(
            'totalDonors',
            'totalRequests',
            'openRequests',
            'totalDonations',
            'totalHospitals'
        ));
    }
}
