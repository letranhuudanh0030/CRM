<?php

namespace App\Http\Controllers;

use App\Permission;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->with('permission')->get();
        $permissions = Permission::all();
        // dd($users);
        return view('manages.user.list')->with('users', $users)
                                        ->with('permissions', $permissions)
                                        ->with('title', 'Danh sách tài khoản');
    }

    public function store()
    {
        // dd(request()->all());
        User::create([
            'name' => request()->name,
            'phone' => request()->phone,
            'email' => request()->email,
            'permission_id' => request()->permission,
            'password' => Hash::make(request()->password)
        ]);
    }

    public function update()
    {
        User::where('id', request()->id)->update([
            'name' => request()->name,
            'phone' => request()->phone,
            'permission_id' => request()->permission,
            ]);
        $user = User::findOrFail(request()->id);
        return response($user, 200);
    }

    public function update_status()
    {
        User::where('id', request()->id)->update(['status' => request()->status]);
        return response("Update status successfully!", 200);
    }

    public function update_password()
    {
        User::where('id', request()->id)->update(['password' => Hash::make(request()->password)]);
        return response("Update password successfully!");
    }

    public function delete()
    {
        $user = User::findOrFail(request()->id);
        $user->delete();
        return response("Delete successfully!", 200);
    }

    public function check_email()
    {
        $newEmail = request()->email;
        $email = User::select('email')->where('email', $newEmail)->first();
        if($email === null){
            echo 'true';
        } else {
            echo 'false';
        }
        
    }
}
