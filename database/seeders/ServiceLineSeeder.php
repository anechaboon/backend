<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceLine;

class ServiceLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceLine::firstOrCreate([
            'name' => 'Technical Support',
            'description' => 'Support for technical issues related to maritime operations.',
            'service_code' => 'TECHSUP',
            'created_by' => 1,
        ]);

        ServiceLine::firstOrCreate([
            'name' => 'Maintenance',
            'description' => 'Handles all maintenance-related tasks.',
            'service_code' => 'MAINT',
            'created_by' => 1,
        ]);

        ServiceLine::firstOrCreate([
            'name' => 'Repair',
            'description' => 'Responsible for repair services.',
            'service_code' => 'REPAIR',
            'created_by' => 1,
        ]);

        ServiceLine::firstOrCreate([
            'name' => 'Inspection',
            'description' => 'Oversees inspection procedures.',
            'service_code' => 'INSPECT',
            'created_by' => 1,
        ]);
    }
}
