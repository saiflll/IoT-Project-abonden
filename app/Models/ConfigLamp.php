<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigLamp extends Model
{
    protected $fillable = [
        'device_id',
        'status',
        'time_on',
        'time_off',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
