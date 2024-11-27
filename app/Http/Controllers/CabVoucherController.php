<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\CabVoucher;
use Illuminate\Http\Request;
use App\Mail\CabVoucherIssue;
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

    /**
     * Display the specified resource.
     */
    public function showCabVoucher(CabVoucher $cabVoucher)
    {
        return view('cabvouchers.cb_view', compact('cabVoucher'));
    }

    public function returnCabVoucher(CabVoucher $cabVoucher)
    {
        try {
            $cabVoucher->status = 'RETURNED';
            $cabVoucher->save();
            return redirect()->route('cabvouchers.index')->with('msgSuccess', 'Cab voucher is returned.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function sendReceipt(CabVoucher $cabVoucher)
    {
        try {
            return view('cabvouchers.cv_return', compact('cabVoucher'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // send your receipt to the admin division
    public function sendReceiptCV(CabVoucher $cabVoucher, Request $request)
    {
        try {
            $validateddata = $request->validate([
                'km_done' => 'required',
                'amount' => 'required|decimal:0,999999',
            ]);
            $cabVoucher->km_done = $validateddata['km_done'];
            $cabVoucher->amount = $validateddata['amount'];
            $cabVoucher->cab_no = $request['cab_no'];
            $cabVoucher->vehicle_no = $request['vehicle_no'];
            $cabVoucher->status = 'USED';
            $cabVoucher->save();
            return redirect()->route('cabvouchers.index')->with('msgSuccess', 'Cab voucher receipt sent.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // method for printing a cab voucher to send to FMD
    public function printCV(CabVoucher $cabVoucher)
    {
        try {
            return view('cabvouchers.cv_print', compact('cabVoucher'));
        } catch (\Throwable $th) {
            //throw $th;
        }
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

    // show history in a table as a summary
    public function showCVHistory(User $user)
    {
        try {
            $user_cabVouchers = $user->cabVouchers;
            $user_total = $user_cabVouchers->where('status', 'USED')->sum('amount');
            return view('cabvouchers.cv_user_history', compact('user_cabVouchers', 'user', 'user_total'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function cvDelete(CabVoucher $cabVoucher)
    {
        try {
            return view('cabvouchers.cv_delete', compact('cabVoucher'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            CabVoucher::where('id', $id)->delete();
            return redirect()->route('cabvouchers.index')->with('msgSuccess', 'Record is deleted');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
