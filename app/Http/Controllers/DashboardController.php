<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Device;
use App\Maintenance;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        $branches = Branch::all();
        $tasks = Maintenance::all();
        $users = User::all();
        
        return view('manages.dashboard')->with([
            'title' => 'Danh sách công việc',
            'devices' => $devices,
            'branches' => $branches,
            'tasks' => $tasks,
            'users' => $users
        ]);
    }
}
