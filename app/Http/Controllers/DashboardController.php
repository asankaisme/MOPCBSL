<?php

namespace App\Http\Controllers;

use App\Models\CabVoucher;
use App\Models\Gatepass;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //desplay gatepass info in the dashboard
    public function displayDashboardInfo()
    {
        // display gatepasses details
        $gatepassesNew = Gatepass::where('status', 'NEW')->get();
        $gatepassesVerified = Gatepass::where('status', 'VRF')->get();
        $gatepassesApproved = Gatepass::where('status', 'APR')->get();
        $gp_total = Gatepass::all();
        // display cab vouchers details
        // $cv_status_counts = CabVoucher::select('status', CabVoucher::raw('count(*) as count'))
        //                     ->groupBy('status')
        //                     ->get();
        $cv_new = CabVoucher::where('status', 'NEW')->get();
        $cv_returned = CabVoucher::where('status', 'RETURNED')->get();
        $cv_used = CabVoucher::where('status', 'USED')->get();
        $cv_total = CabVoucher::where('isActive', 1)->get();

        $cv_total_sum = CabVoucher::where('status', 'USED')->sum('amount');

        return view('home', compact(
            'gatepassesNew',
            'gatepassesVerified',
            'gatepassesApproved',
            'gp_total',
            'cv_new',
            'cv_returned',
            'cv_used',
            'cv_total',
            'cv_total_sum'
        ));
    }
}
