<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\ProductDescription;
use App\Models\ProductItem;
use App\Models\Sale;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Factory::create();

        for ($i = 0; $i < 35; $i++) {
            $sale = new Sale();
            $sale->customer_id = rand(1, Customer::count());
            $sale->sale_date = $faker->dateTimeBetween('-121 days');
            $sale->save();
            foreach (ProductDescription::all() as $product) {
                $quantity = rand(1, $product->productItems->count());
                for ($j = 0; $j < $quantity; $j++) {
                    if (count($product->productItems[$j]->sales) > 0) {
                       continue;
                    }
                    $product->productItems[$j]->sales()->attach($sale->id, [
                        'sale_price' => $product->price * 1.25
                    ]);
                    // Store Sale Price
                }
            }
            if (count($sale->productItems) == 0){
                $sale->delete();
            }
        }
    }
}
