<?php

namespace App\Http\Controllers;

use App\Models\BloodInventory;
use Illuminate\Http\Request;

class BloodInventoryPublicController extends Controller
{
    public function index()
    {
        $inventories = BloodInventory::all();
        return view('qan-ehtiyati', compact('inventories'));
    }
}