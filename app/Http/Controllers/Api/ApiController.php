<?php

namespace App\Http\Controllers\Api;

use App\Device;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function device()
    {
        $devices = Device::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return response($devices, 200);
    }
}
