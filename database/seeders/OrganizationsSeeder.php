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
            'email' => 'info@globalmaritime.com',
            'phone' => '+1234567890',
            'address' => '100 Ocean Avenue, Seaside City',
            'city' => 'Seaside City',
            'country' => 'Atlantis',
            'description' => 'A leading company in maritime services and logistics.',
            'created_by' => 1,
        ]);

        Organization::firstOrCreate([
            'name' => 'Harbor Logistics Ltd.',
            'email' => 'contact@harborlogistics.com',
            'phone' => '+0987654321',
            'address' => '200 Dock Street, Port Town',
            'city' => 'Port Town',
            'country' => 'Nautica',
            'description' => 'Specializing in harbor operations and supply chain management.',
            'created_by' => 1,
        ]);

        Organization::firstOrCreate([
            'name' => 'Navigator Shipping Co.',
            'email' => 'info@navigatorshipping.com',
            'phone' => '+1122334455',
            'address' => '300 Bay Road, Coastal Village',
            'city' => 'Coastal Village',
            'country' => 'Maritima',
            'description' => 'Providing top-notch shipping and freight services worldwide.',
            'created_by' => 1,
        ]);
    }
}
