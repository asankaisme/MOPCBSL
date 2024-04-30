<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Gatepass;
use Illuminate\Http\Request;
use App\Models\GatepassReason;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        ]);
        //dd($request);
        try {
            $lastID = Gatepass::latest()->first();
            //$serialNo = Carbon::today()->format("ymd").str_pad($lastID + 1, 2, "0", STR_PAD_LEFT);
            //dd($serialNo);
            //dd(Carbon::today()->format("ymd").str_pad($lastID + 1, 3, "0", STR_PAD_LEFT));
            //dd(str_pad($lastID + 1, 3, "0", STR_PAD_LEFT));
            //dd(Carbon::today()->format("ymd"));
            //$curdate = Carbon::today();
            $gatepass = new Gatepass();
            $gatepass->serialNo = Carbon::today()->format("ymd").str_pad($lastID + 1, 2, "0", STR_PAD_LEFT);
            $gatepass->companyName = $validatedData['companyName'];
            $gatepass->personName = $validatedData['personName'];
            $gatepass->personNIC = $validatedData['personNIC'];
            $gatepass->validityDate = $validatedData['validityDate'];
            $gatepass->reason = $validatedData['reason'];
            $gatepass->createdBy = Auth::user()->name;
            $gatepass->save();
            return redirect()->route('gatepasses.index')->with('msgSuccess', 'Gatepass header created.');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gatepass $gatepass)
    {
        //
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
    public function destroy(Gatepass $gatepass)
    {
        //
    }
}
