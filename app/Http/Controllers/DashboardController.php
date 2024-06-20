<?php

namespace App\Http\Controllers;

use App\Models\Gatepass;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //desplay gatepass info in the dashboard
    public function displayDashboardInfo()
    {
        $gatepassesNew = Gatepass::where('status', 'NEW')->get();
        $gatepassesVerified = Gatepass::where('status', 'VRF')->get();
        $gatepassesApproved = Gatepass::where('status', 'APR')->get();
        // dd($gatepassesApproved);
        //dd($gatepassesNew);
        return view('home', compact(
            'gatepassesNew',
            'gatepassesVerified',
            'gatepassesApproved',
        ));
    }
}
