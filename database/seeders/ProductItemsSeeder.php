<?php

namespace Database\Seeders;

use App\Models\ProductDescription;
use App\Models\ProductItem;
use App\Services\SkuGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (ProductDescription::all() as $desc) {
            for ($i = 0; $i < rand(1, 40); $i++) {
                $sku = SkuGenerator::generate();

                // Create a new product with the generated SKU
                $product = new ProductItem([
                    'product_description_id' => $desc->id,
                    'sku_number' => $sku,
                    'price' => $desc->price
                ]);

                // Save the product to the database
                $product->save();
            }
        }
    }
}
