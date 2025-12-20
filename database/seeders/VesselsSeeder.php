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
            'imo_number' => '1234567',
        ],[
            'name' => 'MV Sea Voyager',
            'type' => 'Bulk Carrier',
            'flag' => 'Panama',
            'status' => 'active',
            'created_by' => 1,
        ]);

        Vessel::firstOrCreate([
            'imo_number' => '7654321',
        ],[
            'name' => 'FV Oceanic Trader',
            'type' => 'Tanker',
            'flag' => 'Liberia',
            'status' => 'active',
            'created_by' => 1,
        ]);

        Vessel::firstOrCreate([
            'imo_number' => '9876543',
        ],[
            'name' => 'SS Marine Explorer',
            'type' => 'Container',
            'flag' => 'Bahamas',
            'status' => 'active',
            'created_by' => 1,
        ]);
    }
}
