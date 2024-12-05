<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Lending;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $lendings = Lending::where('isActive', 1)->get();

            $available_assets = DB::table('assets')
                ->leftJoin('lendings', 'assets.id', '=', 'lendings.asset_id')
                ->select('assets.*')
                ->where('lendings.isReturned', '=', 1)
                ->orWhere('lendings.isReturned', '=', null)
                ->get();

            $departments = Department::where('isActive', 1)->get();

            return view('lendingAssets.index', compact('lendings', 'available_assets', 'departments'));
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
        try {
            $validatedRequest = $request->validate([
                'asset_id' => 'required',
                'department_id' => 'required',
                'lendingDate' => 'required',
                'taken_by' => 'required|min:3',
            ]);
            // dd($validatedRequest);
            $lendingRequest = new Lending();
            $lendingRequest->asset_id = $validatedRequest['asset_id'];
            $lendingRequest->department_id = $validatedRequest['department_id'];
            $lendingRequest->lendingDate = $validatedRequest['lendingDate'];
            $lendingRequest->taken_by = $validatedRequest['taken_by'];
            $lendingRequest->issued_by = Auth::user()->id;
            $lendingRequest->isReturned = 0;
            $lendingRequest->isActive = 1;
            $lendingRequest->save();
            echo 'yes';
            return redirect()->route('lendingAsset.index')->with('msgSuccess', 'This item is issued successfully.');
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
