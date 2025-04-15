<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConfigHeater;

class ConfigHeaterSeeder extends Seeder
{
    public function run()
    {
        ConfigHeater::create([
            'device_id' => 1, 
            'mode' => 'auto',
            'status' => true,
            'max_temp' => 30.0,
            'min_temp' => 20.0,
        ]);
        ConfigHeater::create([
            'device_id' => 2, 
            'mode' => 'auto',
            'status' => true,
            'max_temp' => 30.0,
            'min_temp' => 20.0,
        ]);
    }
}
