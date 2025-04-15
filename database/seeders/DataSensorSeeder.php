<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataSensor;
use App\Models\Device;
use Illuminate\Support\Facades\DB;

class DataSensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure devices exist before adding sensor data
        $device = Device::first();

        if (!$device) {
            $device = Device::create([
                'user_id' => 1, // Replace with a valid user_id
                'name' => 'Default Device',
            ]);
        }

        // Generate sensor data
        DB::table('data_sensors')->insert([
            [
                'device_id' => $device->id,
                'temperature' => 25.5,
                'humidity' => 60,
                'light_intensity' => 300,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_id' => $device->id,
                'temperature' => 26.7,
                'humidity' => 58,
                'light_intensity' => 320,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'device_id' => $device->id,
                'temperature' => 24.8,
                'humidity' => 65,
                'light_intensity' => 280,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}