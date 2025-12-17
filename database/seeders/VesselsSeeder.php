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
            'address' => '456 Harbor Lane, Coastal Town',
            'created_by' => 1,
        ]);

        Vessel::firstOrCreate([
            'name' => 'FV Oceanic Trader',
            'imo_number' => '7654321',
            'address' => '789 Bay Street, Maritime Village',
            'created_by' => 1,
        ]);

        Vessel::firstOrCreate([
            'name' => 'SS Marine Explorer',
            'imo_number' => '9876543',
            'address' => '123 Ocean Drive, Port City',
            'created_by' => 1,
        ]);
    }
}
