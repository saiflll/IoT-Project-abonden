<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConfigLamp;

class ConfigLampSeeder extends Seeder
{
    public function run()
    {
        ConfigLamp::create([
            'device_id' => 1, 
            'status' => true,
            'time_on' => '08:00:00',
            'time_off' => '20:00:00',
        ]);
        ConfigLamp::create([
            'device_id' => 2, 
            'status' => true,
            'time_on' => '08:00:00',
            'time_off' => '20:00:00',
        ]);

    }
   
}
