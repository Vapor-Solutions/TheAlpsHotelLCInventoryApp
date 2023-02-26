<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Bedding and Linens',
            'Bathroom Essentials',
            'Room Service Supplies',
            'Conference Room Equipment',
            'Hotel Furniture',
            'Guest Amenities',
            'Housekeeping Supplies',
            'In-Room Entertainment',
            'Hotel Uniforms',
            'Hotel Security Systems'
        ];

        foreach ($categories as $category) {
            ProductCategory::create([
                'title' => $category,
            ]);
        }
    }
}
