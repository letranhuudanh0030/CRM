<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

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
        Permission::create([
            'name' => request()->name
        ]);
    }

    public function update()
    {
        dd(request()->all());
        Permission::where('id', request()->id)->update(['name' => request()->name]);
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
