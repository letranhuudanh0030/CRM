<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Device;
use App\Maintenance;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function index()
    {
        $tasks = Maintenance::orderBy('created_at', 'DESC')->get();
        $devices = Device::where('status', 1)->get();
        $branchs = Branch::where('status', 1)->get(); 
        $technicians = User::where('status', 1)->get();
        return view('manages.task.list')->with('tasks', $tasks)
                                        ->with('devices', $devices)
                                        ->with('branchs', $branchs)
                                        ->with('technicians', $technicians)
                                        ->with('title', 'Danh sách công việc bảo trì');
    }

    public function store()
    {

        Maintenance::create([
            'device_id' => request()->device_id,
            'device_damaged' => request()->device_damaged,
            'user_id' => Auth::id(),
            'branch_id' => request()->branch_id,
            'technicians_id' => request()->technician_id,
            'result' => request()->result,
            'note' => request()->note,
            'required_date' => request()->start_date,
            'success_date' => request()->end_date
        ]);
    }

    public function update()
    {

        Maintenance::where('id', request()->id)->update([
            'device_id' => request()->device_id,
            'device_damaged' => request()->device_damaged,
            'branch_id' => request()->branch_id,
            'technicians_id' => request()->technician_id,
            'result' => request()->result,
            'note' => request()->note,
            'required_date' => request()->start_date,
            'success_date' => request()->end_date
        ]);
        $task = Maintenance::findOrFail(request()->id);
        return response($task, 200);
    }

    public function update_status()
    {
        Maintenance::where('id', request()->id)->update(['status' => request()->status]);
        return response("Update status successfully!", 200);
    }

    public function delete()
    {
        $task = Maintenance::findOrFail(request()->id);
        $task->delete();
        return response("Delete successfully!", 200);
    }

    public function upload()
    {
        // $file_name =  request()->file->originalName;
        // $file_extension = request()->file->mimeType;
        // $date = Carbon::now()->format('d_m_Y'); 
        dd(request()->file->extension());
    }

}
