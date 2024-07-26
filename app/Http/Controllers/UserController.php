<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //view users
    public function index()
    {
        try {
            $users = User::all();
            return view('users.index', compact('users'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(User $user)
    {
        try {
            // dd($user->getRoleNames());
            return view('users.edit-user', compact('user'));
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}
