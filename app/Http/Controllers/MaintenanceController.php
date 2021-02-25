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
        $devices = Device::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $branchs = Branch::where('status', 1)->orderBy('created_at', 'DESC')->get(); 
        $technicians = User::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('manages.task.list')->with('tasks', $tasks)
                                        ->with('devices', $devices)
                                        ->with('branchs', $branchs)
                                        ->with('technicians', $technicians)
                                        ->with('title', 'Danh sách công việc bảo trì');
    }

    public function store()
    {
        // dd(request()->all());
        Maintenance::create([
            'device_id' => request()->device_id,
            'device_damaged' => request()->device_damaged,
            'user_id' => Auth::id(),
            'branch_id' => request()->branch_id,
            'technicians_id' => request()->technician_id,
            'result' => request()->result,
            'note' => request()->note,
            'required_date' => request()->start_date,
            'success_date' => request()->end_date,
            'image_device_damaged' => $this->urlImgProcess(request()->imgs_device_damaged),
            'image_result' => $this->urlImgProcess(request()->imgs_device_result)
        ]);
    }

    public function update()
    {
        // dd(request()->all());
        Maintenance::where('id', request()->id)->update([
            'device_id' => request()->device_id,
            'device_damaged' => request()->device_damaged,
            'branch_id' => request()->branch_id,
            'technicians_id' => request()->technician_id,
            'result' => request()->result,
            'note' => request()->note,
            'required_date' => request()->start_date,
            'success_date' => request()->end_date,
            'image_device_damaged' => $this->urlImgProcess(request()->imgs_device_damaged),
            'image_result' => $this->urlImgProcess(request()->imgs_device_result)
        ]);
        // $task = Maintenance::findOrFail(request()->id);
        $task = Maintenance::where('id', request()->id)->with(['device', 'branch', 'creator', 'technician'])->first();
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

    public function urlImgProcess($urls)
    {
        $images = null;
        if($urls){
            $imgArr = json_decode($urls);
            if(is_array($imgArr)){

                foreach ($imgArr as $key => $image) {
                    if($key > 0){

                        $images .= ',' . str_replace(url('/'),'', $image);
                    }else {
                        $images .= str_replace(url('/'),'', $image);
                    }
                }
            } else {
                $images = str_replace(url('/'),'', $urls);
            }
        }
        return $images;
    }

    public function detail($id)
    {
        $task = Maintenance::findOrFail($id);
        $tasks = Maintenance::all();
        return view('manages.task.detail', [
            'task' => $task,
            'tasks' => $tasks
        ]);
    }

}
