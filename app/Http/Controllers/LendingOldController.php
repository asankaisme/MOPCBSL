<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Lending;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class LendingController extends Controller
{
    //show index page
    public function index()
    {
        $lendings = Lending::where('isActive', 1)->get();
        // dd($lendings);
        $available_assets = Lending::leftJoin('assets', 'lendings.asset_id', '=', 'assets.id')
                            ->select('lendings.*')
                            ->where('lendings.isReturned', '=', 1)
                            ->get();
         dd($available_assets);                   
        return view('lendingAssets.index', compact('lendings', 'assets'));
    }
}
