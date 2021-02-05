<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['device_id', 'device_damaged', 'user_id', 'branch_id', 'technicians_id', 'result', 'note', 'required_date', 'success_date', 'status', 'image_device_damaged', 'image_result'];
    
    
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technicians_id');
    }
}

