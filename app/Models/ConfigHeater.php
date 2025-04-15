<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigHeater extends Model
{
    protected $fillable = [
        'device_id',
        'mode',
        'status',
        'max_temp',
        'min_temp',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}