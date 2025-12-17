<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organization;

class OrganizationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::firstOrCreate([
            'name' => 'Global Maritime Inc.',
            'address' => '100 Ocean Avenue, Seaside City',
            'created_by' => 1,
        ]);

        Organization::firstOrCreate([
            'name' => 'Harbor Logistics Ltd.',
            'address' => '200 Dock Street, Port Town',
            'created_by' => 1,
        ]);

        Organization::firstOrCreate([
            'name' => 'Navigator Shipping Co.',
            'address' => '300 Bay Road, Coastal Village',
            'created_by' => 1,
        ]);
    }
}
