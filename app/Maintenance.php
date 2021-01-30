<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['device_name', 'device_status', 'device_damaged', 'user_id', 'branch_id', 'technicians_id', 'result', 'note', 'required_date', 'success_date', 'status'];
}
