<?php

namespace Database\Seeders;

use App\Models\ProductDescription;
use App\Models\ProductItem;
use App\Models\Purchase;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            $purchase = new Purchase();
            $purchase->purchase_date = Carbon::now()->startOfMonth()->toDateString();
            $purchase->supplier_id = rand(1, count(Supplier::all()));
            $purchase->save();
            $quantity = rand(50, 120);
            for ($j = 0; $j < $quantity; $j++) {
                $productItem = new ProductItem();
                $productItem->product_description_id = rand(1, count(ProductDescription::all()));
                $productItem->sku_number = Str::random(9);
                $productItem->price = $productItem->productDescription->price + rand(-100, 200);
                $productItem->save();
                $productItem->purchases()->attach($purchase->id);
            }
        }
    }
}
