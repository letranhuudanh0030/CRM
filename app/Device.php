<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['name', 'type_id', 'qty', 'status'];

    public function type()
    {
        return $this->belongsTo(DeviceType::class);
    }
}
