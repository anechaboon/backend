<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::firstOrCreate([
            'name' => 'Anti Virus',
            'description' => 'Category for antivirus related issues.',
            'status' => 'active',
            'created_by' => 1,
        ]);
        
        Category::firstOrCreate([
            'name' => 'Safety',
            'description' => 'Issues related to safety protocols and regulations.',
            'status' => 'active',
            'created_by' => 1,
        ]);

        Category::firstOrCreate([
            'name' => 'Operations',
            'description' => 'Operational challenges and logistics.',
            'status' => 'active',
            'created_by' => 1,
        ]);

        Category::firstOrCreate([
            'name' => 'Technical',
            'description' => 'Technical problems and IT support.',
            'status' => 'active',
            'created_by' => 1,
        ]);

        Category::firstOrCreate([
            'name' => 'Customer Service',
            'description' => 'Customer service inquiries and feedback.',
            'status' => 'active',
            'created_by' => 1,
        ]);
    }
}
