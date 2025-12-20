<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'email' => 'admin@test.com',
        ],[
            'full_name' => 'Admin User',
            'password' => bcrypt('11111111'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        User::firstOrCreate([
            'email' => 'staff1@test.com',
        ],[
            'full_name' => 'Staff User 1',
            'password' => bcrypt('11111111'),
            'role' => 'staff',
            'status' => 'active',
        ]);

        User::firstOrCreate([
            'email' => 'staff2@test.com',
        ],[
            'full_name' => 'Staff User 2',
            'password' => bcrypt('11111111'),
            'role' => 'staff',
            'status' => 'active',
        ]);
    }
}
