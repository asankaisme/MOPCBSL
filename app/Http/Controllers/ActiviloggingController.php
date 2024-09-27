<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActiviloggingController extends Controller
{
    //show all activities in the activity log table
    public function showActivites()
    {
        $activities = DB::table('activity_log')
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('logs.index', compact('activities'));
    }
}
