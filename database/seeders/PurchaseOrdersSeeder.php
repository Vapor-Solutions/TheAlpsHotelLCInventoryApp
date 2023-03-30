<?php

namespace Database\Seeders;

use App\Models\ProductDescription;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            $order = new PurchaseOrder();
            $order->supplier_id = rand(1, count(Supplier::all()));
            $order->user_id = 1;
            $order->save();
            $quantity = rand(5, 15);
            for ($j = 0; $j < $quantity; $j++) {
                $product = ProductDescription::find(rand(1, count(ProductDescription::all())));
                $order->productDescriptions()->attach($product->id, [
                    'quantity' => rand(50, 120)
                ]);
            }
        }
    }
}
