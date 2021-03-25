<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'DESC')->get();
        return view('manages.permission.list')->with('permissions', $permissions)
                                        ->with('title', 'Danh sách thiết bị');
    }

    public function store()
    {
        // dd(request()->role);
        Permission::create([
            'name' => request()->name,
            'role' => request()->role
        ]);

        Session::flash('success', 'Thêm nhóm người dùng thành công.');
    }

    public function update()
    {
        Permission::where('id', request()->id)->update([
            'name' => request()->name,
            'role' => request()->role
            ]);
        $permission = Permission::findOrFail(request()->id);
        return response($permission, 200);
    }

    public function update_status()
    {
        Permission::where('id', request()->id)->update(['status' => request()->status]);
        return response("Update status successfully!", 200);
    }

    public function delete()
    {
        $permission = Permission::findOrFail(request()->id);
        $permission->delete();
        return response("Delete successfully!", 200);
    }
}
