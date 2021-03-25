<?php

namespace App\Http\Controllers;

use App\Device;
use App\DeviceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::orderBy('created_at', 'DESC')->get();
        $types = DeviceType::where('status', 1)->get();

        return view('manages.device.list')->with('devices', $devices)
                                        ->with('types', $types)
                                        ->with('title', 'Danh sách thiết bị');
    }

    public function store()
    {
        $device = Device::create([
            'name' => request()->name,
            'type_id' => request()->type_id,
            'qty' => request()->qty
        ]);
        Session::flash('success', 'Thêm thiết bị thành công.');
        return response($device, 200);
    }

    public function update()
    {
        Device::where('id', request()->id)->update([
            'name' => request()->name,
            'type_id' => request()->type_id,
            'qty' => request()->qty
        ]);
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
