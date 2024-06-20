<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Gatepass;
use Illuminate\Http\Request;
use App\Models\GatepassReason;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class GatepassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //load a list of gatepasses
        $gatepasses = Gatepass::all();
        return view('gatepasses.index', compact('gatepasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //load basic create view
        $reasons = GatepassReason::where('status', 'A')->get();
        return view('gatepasses.create', compact('reasons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data
        $validatedData = $request->validate([
            'companyName' => 'required',
            'personName' => 'required',
            'personNIC' => 'required',
            'validityDate' => 'required',
            'reason' => 'required',
        ]);
        //dd($validatedData);
        try {
            $lastID = Gatepass::max('id') ?? 0;
            $gatepass = new Gatepass();
            // $gatepass->serialNo = Carbon::today()->format("ymd").str_pad($lastID + 1, 4, "0", STR_PAD_LEFT);
            $gatepass->serialNo = Carbon::today()->format("ymd") . mt_rand(1000, 9999);
            //$gatepass->fill($validatedData);
            $gatepass->companyName = $validatedData['companyName'];
            $gatepass->personName = $validatedData['personName'];
            $gatepass->personNIC = $validatedData['personNIC'];
            $gatepass->validityDate = $validatedData['validityDate'];
            $gatepass->reason = $validatedData['reason'];
            $gatepass->createdBy = Auth::user()->id;
            $gatepass->createdDate = Carbon::today()->format('Y-m-d');
            $gatepass->status = "NEW";
            $gatepass->save();
            return redirect()->route('gatepasses.addItemsToGatepass', $gatepass->id)->with('msgSuccess', 'Gatepass header created.');
        } catch (\Throwable $th) {
            //throw $th;
            echo $th->getMessage();
            //return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while creating the gatepass.']);
        }
    }

    //method for adding itms to the gatepass
    public function addItemsToGatepass(Gatepass $gatepass)
    {
        try {
            return view('gatepasses.add-items-gp', compact('gatepass'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // method for verifying gatepasses
    public function viewGatepassToVerify(Gatepass $gatepass)
    {
        try {
            return view('gatepasses.verify-gatepass', compact('gatepass'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // method for verifying gatepasses
    public function verifyGatepass(Gatepass $gatepass)
    {
        try {
            //dd($gatepass->id);
            $gatepass->verifiedBy = Auth::user()->id;
            $gatepass->verifiedDate = Carbon::now()->format("Y-m-d");
            $gatepass->status = 'VRF';
            $gatepass->save();
            return redirect()->route('gatepasses.index')->with('msgSuccess', 'Gatepass is verified.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // method for approve gatepasses
    public function viewGatepassToApprove(Gatepass $gatepass)
    {
        try {
            return view('gatepasses.approve-gatepass', compact('gatepass'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // method for verifying gatepasses
    public function approveGatepass(Gatepass $gatepass)
    {
        try {
            $gatepass->authBy = Auth::user()->id;
            $gatepass->authDate = Carbon::now()->format("Y-m-d");
            $gatepass->status = 'APR';
            $gatepass->save();
            return redirect()->route('gatepasses.index')->with('msgSuccess', 'Gatepass is approved.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Gatepass $gatepass)
    {
        //show gatepass details
        return view('gatepasses.view-gatepass', compact('gatepass'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gatepass $gatepass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gatepass $gatepass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function viewBeforeDestroy(Gatepass $gatepass)
    {
        return view('gatepasses.delete-gatepass', compact('gatepass'));
    }

    public function destroy(Gatepass $gatepass)
    {
        try {
            foreach ($gatepass->gatepassItem as $gp) 
            {
                $gp->delete();
            }
            $gatepass->delete();
            return redirect()->route('gatepasses.index')->with('msgSuccess', 'Gatepass is deleted!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
