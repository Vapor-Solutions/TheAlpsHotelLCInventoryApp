<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 30; $i++) {
            $supplier = new Supplier();
            $supplier->name = $faker->name;
            $supplier->email = Str::slug($supplier->name) . '@gmail.com';
            $supplier->phone_number = $faker->phoneNumber;
            $supplier->address = $faker->address;
            $supplier->kra_pin = "A" . random_int(010000000, 9999999999) . Str::upper($faker->randomLetter);
            $supplier->save();
        }
    }
}
