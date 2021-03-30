<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Device;
use App\DeviceType;
use App\Jobs\SendEmail;
use App\Mail\TaskCreated;
use App\Maintenance;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MaintenanceController extends Controller
{
    public function index()
    {
        // dd(Session::all());
        $tasks = Maintenance::orderBy('created_at', 'DESC')->get();
        $devices = Device::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $branchs = Branch::where('status', 1)->orderBy('created_at', 'DESC')->get(); 
        $technicians = User::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $types = DeviceType::where('status', 1)->get();
        return view('manages.task.list')->with('tasks', $tasks)
                                        ->with('devices', $devices)
                                        ->with('branchs', $branchs)
                                        ->with('technicians', $technicians)
                                        ->with('title', 'Danh sách công việc bảo trì')
                                        ->with('types', $types);
    }

    public function store()
    {
        // dd(request()->all());
        if(request()->start_date != "undefined"){
            $required_date = request()->start_date;
        } else {
            $required_date = now();
        }

        if(request()->end_date != "undefined"){
            $success_date = request()->end_date;
        } else {
            $success_date = null;
        }



        $task = Maintenance::create([
            'device_id' => request()->device_id,
            'device_damaged' => request()->device_damaged,
            'user_id' => Auth::id(),
            'branch_id' => request()->branch_id,
            'technicians_id' => request()->technician_id,
            'result' => request()->result,
            'note' => request()->note,
            'required_date' => $required_date,
            'success_date' => $success_date,
            'image_device_damaged' => $this->urlImgProcess(request()->imgs_device_damaged),
            'image_result' => $this->urlImgProcess(request()->imgs_device_result)
        ]);

        $this->sendMail($task->id);
    }

    public function update()
    {
        // dd(request()->all());
        if(request()->start_date != "undefined"){
            $required_date = request()->start_date;
        } else {
            $required_date = null;
        }
        
        if(request()->end_date != null){
            $success_date = request()->end_date;
        } else {
            // dd(123);
            $success_date = null;
            if(request()->result == 3){
                $success_date = now();
            }
        }


        Maintenance::where('id', request()->id)->update([
            'device_id' => request()->device_id,
            'device_damaged' => request()->device_damaged,
            'branch_id' => request()->branch_id,
            'technicians_id' => request()->technician_id,
            'result' => request()->result,
            'note' => request()->note,
            'required_date' => $required_date,
            'success_date' => $success_date,
        ]);


        

        // $task = Maintenance::findOrFail(request()->id);
        $task = Maintenance::where('id', request()->id)->with(['device', 'branch', 'creator', 'technician'])->first();
        if(request()->imgs_device_damaged){
            $imgs_device_damaged = $this->urlImgProcess(request()->imgs_device_damaged);
            $task->image_device_damaged = $imgs_device_damaged;
        }

        if(request()->imgs_device_result){
            $imgs_device_result = $this->urlImgProcess(request()->imgs_device_result);
            $task->image_result = $imgs_device_result;
        }
        $task->save();

        Session::flash('success', 'Cập nhật công việc thành công.');

        if($task->result == 2){
            // $this->sendMail($task->id);
        }
        
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
        $devices = Device::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $branchs = Branch::where('status', 1)->orderBy('created_at', 'DESC')->get(); 
        $technicians = User::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $types = DeviceType::where('status', 1)->get();

        return view('manages.task.detail', [
            'task' => $task,
            'tasks' => $tasks,
            'devices' => $devices,
            'branchs' => $branchs,
            'technicians' => $technicians,
            'types' => $types
        ]);
    }

    public function sendMail($taskId)
    {
        $task = Maintenance::findOrFail($taskId);
        $mailAddress = "danh.nambo@gmail.com";
        // Mail::to('danh.nambo@gmail.com')->queue(new TaskCreated($task));
        $emailJob = new SendEmail($task, $mailAddress);
        dispatch($emailJob);

        Session::flash('success', 'Gửi mail thành công.');
    }

    public function change_success()
    {
        // dd(request()->all());
        $id = request()->id;
        $task = Maintenance::findOrFail($id);
        $task->success_date = now();
        $task->result = 2;
        $task->save();
        return response($task);
    }

    public function upload()
    {
        $files =  request()->file();

        // Upload path
        $destinationPath = 'uploads/';

        // Create directory if not exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Valid extensions
        $validextensions = array("jpeg","jpg","png","pdf");
        $res = [];
        $urls = [];
        foreach ($files as $file => $images) {
            if(request()->hasFile($file)){
                
                foreach ($images as $key => $image) {

                    // Get file extension
                    $extension = $image->getClientOriginalExtension();

                    // Check extension
                    if(in_array(strtolower($extension), $validextensions)){
        
                        // Rename file
                        $fileFullName = $image->getClientOriginalName();
                        // $fileName = Str::slug(pathinfo($fileFullName, PATHINFO_FILENAME), '-').".$extension";
                        // if (file_exists("/$destinationPath".$fileName)) {
                            $fileName = Str::slug(pathinfo($fileFullName, PATHINFO_FILENAME), '-')."($key)_".time().".$extension";
                        // }
                        // Uploading file to given path
                        $image->move($destinationPath, $fileName); 
                        $urls[] = "/$destinationPath".$fileName;
                    }
                }
                $res['file'] = $file;
                $res['url'] = implode(",", $urls);
            }
        }
        return response($res);
    }
}
