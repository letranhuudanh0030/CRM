<?php

namespace App\Http\Controllers;

use App\DeviceType;
use Illuminate\Http\Request;

class DeviceTypeController extends Controller
{
    public function index()
    {
        $types = DeviceType::orderBy('created_at', 'DESC')->get();
        return view('manages.device_type.list')->with('types', $types)
                                        ->with('title', 'Danh sách loại thiết bị');
    }

    public function store()
    {
        $type = DeviceType::create([
            'name' => request()->name,
        ]);
        return response($type, 200);
    }

    public function update()
    {
        DeviceType::where('id', request()->id)->update([
            'name' => request()->name,
        ]);
        $type = DeviceType::findOrFail(request()->id);
        return response($type, 200);
    }

    public function update_status()
    {
        DeviceType::where('id', request()->id)->update(['status' => request()->status]);
        return response("Update status successfully!", 200);
    }

    public function delete()
    {
        $type = DeviceType::findOrFail(request()->id);
        $type->delete();
        return response("Delete successfully!", 200);
    }
}
