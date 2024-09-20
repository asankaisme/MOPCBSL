<?php

namespace App\Http\Controllers;

use App\Mail\NewUserAdded;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserRoleChanged;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

    // add a new user
    public function addNewUser(Request $request)
    {
        try {
            $validated_data = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
            ]);
            $newUser = new User();
            $newUser->name = $validated_data['name'];
            $newUser->email = $validated_data['email'];
            $newUser->password = Hash::make('test@1234');
            $newUser->isActive = 1;
            $newUser->save();
            $newUser->assignRole('Guest');
            Mail::to($newUser->email)->send(new NewUserAdded($newUser));
            return redirect()->route('manageUsers')->with('msgSuccess', 'New user added.');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
