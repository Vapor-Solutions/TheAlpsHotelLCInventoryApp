<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Dispatch;
use App\Models\ProductDescription;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 35; $i++) {
            $dispatch = new Dispatch();
            $dispatch->department_id = rand(1, Department::count());
            $dispatch->dispatch_date = $faker->dateTimeBetween('-121 days');
            $dispatch->save();
            foreach (ProductDescription::all() as $product) {
                $quantity = rand(1, $product->productItems->count());
                for ($j = 0; $j < $quantity; $j++) {
                    if (count($product->productItems[$j]->dispatches) > 0) {
                       continue;
                    }
                    $product->productItems[$j]->dispatches()->attach($dispatch->id,);
                }
            }
            if (count($dispatch->productItems) == 0){
                $dispatch->delete();
            }
        }
    }
}
