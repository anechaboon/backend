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
            'full_name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => bcrypt('11111111'),
            'role' => 'admin',
            'status' => 'active',
        ]);
    }
}
