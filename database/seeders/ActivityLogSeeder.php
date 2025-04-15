<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActivityLog;
use Faker\Factory as Faker;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            ActivityLog::create([
                'log_name' => $faker->randomElement(['Device Created', 'Device Updated', 'Device Deleted']),
                'subject_id' => $faker->numberBetween(1, 10),
                'subject_type' => 'App\\Models\\Device',
                'causer_id' => $faker->numberBetween(1, 5),
                'causer_type' => 'App\\Models\\User',
                'properties' => json_encode([
                    'id' => $faker->numberBetween(1, 10),
                    'user_id' => $faker->numberBetween(1, 5),
                    'name' => $faker->word,
                    'created_at' => $faker->dateTime,
                    'updated_at' => $faker->dateTime,
                ]),
            ]);
        }
    }
}