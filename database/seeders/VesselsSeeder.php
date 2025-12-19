<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vessel;

class VesselsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vessel::firstOrCreate([
            'name' => 'MV Sea Voyager',
            'imo_number' => '1234567',
            'type' => 'Bulk Carrier',
            'flag' => 'Panama',
            'status' => 'active',
            'created_by' => 1,
        ]);

        Vessel::firstOrCreate([
            'name' => 'FV Oceanic Trader',
            'imo_number' => '7654321',
            'type' => 'Tanker',
            'flag' => 'Liberia',
            'status' => 'active',
            'created_by' => 1,
        ]);

        Vessel::firstOrCreate([
            'name' => 'SS Marine Explorer',
            'imo_number' => '9876543',
            'type' => 'Container',
            'flag' => 'Bahamas',
            'status' => 'active',
            'created_by' => 1,
        ]);
    }
}
