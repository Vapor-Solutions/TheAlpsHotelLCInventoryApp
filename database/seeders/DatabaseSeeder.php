<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CustomersSeeder::class,
            SuppliersSeeder::class,
            UnitsSeeder::class,
            BrandsSeeder::class,
            ProductCategoriesSeeder::class,
            ProductDescriptionsSeeder::class,
            ProductItemsSeeder::class,
            PurchasesSeeder::class,
            SalesSeeder::class,
        ]);
    }
}
