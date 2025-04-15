<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Device;

class DeviceSeeder extends Seeder
{
    public function run()
    {
        Device::create([
            'user_id' => 1, 
            'name' => 'Device 1',
        ]);
        Device::create([
            'user_id' => 2, 
            'name' => 'Device 2',
        ]);

    }
}
