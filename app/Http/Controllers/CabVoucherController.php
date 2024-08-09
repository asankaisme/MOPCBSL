<?php

namespace App\Http\Controllers;

use App\Mail\CabVoucherIssue;
use App\Models\CabVoucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CabVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cabVouchers = CabVoucher::all();
            return view('cabvouchers.index', compact('cabVouchers'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //strore cab voucher details
        try {
            $validatedRequest = $request->validate([
                'cv_from' => 'required',
                'cv_to' => 'required',
                'requestDate' => 'required',
                'cv_provider' => 'required',
                'remarks' => 'required',
            ]);

            $cabVoucher = new CabVoucher();
            $cabVoucher->requesterName = Auth::user()->id;
            $cabVoucher->bank_id = Auth::user()->bank_id;
            $cabVoucher->requestDate = $validatedRequest['requestDate'];
            $cabVoucher->cv_provider = $validatedRequest['cv_provider'];
            $cabVoucher->cv_from = $validatedRequest['cv_from'];
            $cabVoucher->cv_to = $validatedRequest['cv_to'];
            $cabVoucher->remarks = $validatedRequest['remarks'];
            $cabVoucher->status = "NEW";
            $cabVoucher->save();
            return redirect()->route('cabvouchers.index')->with('msgSuccess', 'Cab voucher request has been created successfully.');
        } catch (\Throwable $th) {
            throw $th;
            return redirect()->route('cabvouchers.index')->with('msgDanger', 'Request failed!');
        }
    }

    // Issue Cab Vouchers
    public function issueCabVoucher(CabVoucher $cabVoucher)
    {
        try {
            return view('cabvouchers.cb_issue', compact('cabVoucher'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Issue cab voucher number
    public function storeCabVoucherNumber(CabVoucher $cabVoucher, Request $request)
    {
        try {
            $validatedRequest = $request->validate([
                'cv_number' => 'required',
            ]);
            $cabVoucher->cv_number = $validatedRequest['cv_number'];
            $cabVoucher->status = 'ISSUED';
            $cabVoucher->issuedBy = Auth::user()->id;
            $cabVoucher->save();
            Mail::to($cabVoucher->UserRequested->email)->send(new CabVoucherIssue($cabVoucher));
            return redirect()->route('cabvouchers.index')->with('msgSuccess', 'Cab Voucher issued.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Return cab voucher number
    public function returnCabVoucher(CabVoucher $cabVoucher, Request $request)
    {
        try {
            $validatedRequest = $request->validate([
                'cv_number' => 'required',
            ]);
            $cabVoucher->cv_number = $validatedRequest['cv_number'];
            $cabVoucher->status = 'ISSUED';
            $cabVoucher->issuedBy = Auth::user()->id;
            $cabVoucher->save();
            return redirect()->route('cabvouchers.index')->with('msgSuccess', 'Cab Voucher issued.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
