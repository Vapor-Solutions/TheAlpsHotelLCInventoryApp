<?php

namespace Database\Seeders;

use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        for ($i = 0; $i < 30; $i++) {
            $customer = new Customer();
            $customer->name = $faker->name;
            $customer->email = Str::slug($customer->name). '@gmail.com';
            $customer->phone_number = $faker->phoneNumber;
            $customer->address = $faker->address;
            $customer->kra_pin = "A" . random_int(010000000, 9999999999) . Str::upper($faker->randomLetter);
            $customer->save();
        }
    }
}
