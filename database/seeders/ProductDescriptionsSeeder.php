<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\ProductDescription;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDescriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ProductCategory::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= rand(1, 35); $i++) {
                if ($category->title === 'Food & Beverages') {
                    $name = $this->getFoodName();
                    $description = $this->getFoodDescription($name);
                    $price = rand(10, 50) * 10;
                } elseif ($category->title === 'Toiletries') {
                    $name = $this->getToiletryName();
                    $description = $this->getToiletryDescription($name);
                    $price = rand(1, 60) * 10;
                } elseif ($category->title === 'Bedding & Linens') {
                    $name = $this->getBeddingName();
                    $description = $this->getBeddingDescription($name);
                    $price = rand(10, 80) * 10;
                } elseif ($category->title === 'Electronics') {
                    $name = $this->getElectronicName();
                    $description = $this->getElectronicDescription($name);
                    $price = rand(50, 200) * 10;
                } else {
                    $name = $this->getMiscellaneousName();
                    $description = $this->getMiscellaneousDescription($name);
                    $price = rand(5, 50) * 10;
                }

                ProductDescription::create([
                    'title' => $name,
                    'brand_id' => rand(1, count(Brand::all())),
                    'description' => $description,
                    'price' => $price,
                    'product_category_id' => $category->id,
                    'unit_id' => rand(1, count(Unit::all())),
                    'quantity' => rand(2, 500)
                ]);
            }
        }
    }

    private function getFoodName()
    {
        $names = [
            'Continental Breakfast',
            'Eggs Benedict',
            'Pancakes',
            'Waffles',
            'French Toast',
            'Omelette',
            'Bagel & Cream Cheese',
            'Croissant',
            'Muffin',
            'Danish',
        ];

        return $names[array_rand($names)];
    }

    private function getFoodDescription($name)
    {
        return "A delicious $name served with coffee or tea.";
    }

    private function getToiletryName()
    {
        $names = [
            'Shampoo',
            'Conditioner',
            'Soap',
            'Body Wash',
            'Body Lotion',
            'Hand Soap',
            'Shower Cap',
            'Toothbrush',
            'Toothpaste',
            'Mouthwash',
        ];

        return $names[array_rand($names)];
    }

    private function getToiletryDescription($name)
    {
        return "A travel-size $name for your convenience.";
    }

    private function getBeddingName()
    {
        $names = [
            'Pillowcase',
            'Sheet Set',
            'Comforter',
            'Blanket',
            'Duvet Cover',
            'Pillow',
            'Mattress Pad',
            'Throw Pillow',
            'Bath Towel',
            'Hand Towel',
        ];

        return $names[array_rand($names)];
    }
    private function getBeddingDescription($name)
    {
        return "A soft and comfortable $name for a good night's sleep.";
    }

    private function getElectronicName()
    {
        $names = [
            'Smart TV',
            'Bluetooth Speaker',
            'Wireless Charger',
            'Noise-Cancelling Headphones',
            'Tablet',
            'Laptop',
            'Smartphone',
            'Power Bank',
            'Gaming Console',
            'Digital Camera',
        ];

        return $names[array_rand($names)];
    }

    private function getElectronicDescription($name)
    {
        return "A high-quality $name for your entertainment or productivity needs.";
    }

    private function getMiscellaneousName()
    {
        $names = [
            'Laundry Bag',
            'Umbrella',
            'Luggage Rack',
            'Iron & Ironing Board',
            'Safety Box',
            'Room Service Menu',
            'Wine Glasses',
            'Mini Fridge',
            'Disposable Slippers',
            'Mosquito Repellent',
        ];

        return $names[array_rand($names)];
    }

    private function getMiscellaneousDescription($name)
    {
        return "A $name for your comfort and convenience during your stay.";
    }
}
