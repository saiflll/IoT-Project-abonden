<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSensor extends Model
{
    protected $fillable = [
        'device_id',
        'temperature',
        'humidity',
        'light_intensity',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
