<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    //show index page
    public function index()
    {
        $lendings = Lending::where('isActive', 1)->get();
        // dd($lendings);
        return view('lendingAssets.index', compact('lendings'));
    }
}
