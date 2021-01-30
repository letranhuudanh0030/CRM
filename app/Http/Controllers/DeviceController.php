<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::orderBy('created_at', 'DESC')->get();
        return view('manages.device.list')->with('devices', $devices)
                                        ->with('title', 'Danh sách thiết bị');
    }

    public function store()
    {
        Device::create([
            'name' => request()->name
        ]);
    }

    public function update()
    {
        Device::where('id', request()->id)->update(['name' => request()->name]);
        $device = Device::findOrFail(request()->id);
        return response($device, 200);
    }

    public function update_status()
    {
        Device::where('id', request()->id)->update(['status' => request()->status]);
        return response("Update status successfully!", 200);
    }

    public function delete()
    {
        $device = Device::findOrFail(request()->id);
        $device->delete();
        return response("Delete successfully!", 200);
    }
}
