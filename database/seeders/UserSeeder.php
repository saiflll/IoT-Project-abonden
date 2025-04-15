<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin test',
            'email' => 'a@a.com',
            'password' => bcrypt('adminadmin'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'user test',
            'email' => 'u@u.com',
            'password' => bcrypt('useruser'),
            'role' => 'user',
        ]);
    }
}