<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserRoleChanged;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    // edit individual users
    public function edit(User $user)
    {
        try {
            $roles = DB::table('roles')->get();
            return view('users.edit-user', compact('user', 'roles'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // chage user roles
    public function changeUserRole(User $user, Request $request)
    {
        try {
            $roleName = $user->roles->first()->name;
            if($roleName != $request['role']){
                // $user->removeRole($roleName);
                // $user->assignRole($request['role']);
                // dd($user->email);
                $user->syncRoles($request['role']);
                Mail::to($user->email)->send(new UserRoleChanged($user));
                return redirect()->route('editUser', $user->id)->with('msgSuccess', 'User role is changed to "'.$request['role'].'"');
            }else{
                return redirect()->route('editUser', $user->id)->with('msgDanger', 'Current role is same as the "'.$request['role'].'"');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
