<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unit = new Unit();
        $unit->unit_type_id = 1;
        $unit->title = "Kilogram";
        $unit->symbol = "kg";
        $unit->rate = 0.001;
        $unit->save();

        $unit = new Unit();
        $unit->unit_type_id = 2;
        $unit->title = "Mililitres";
        $unit->symbol = "ml";
        $unit->rate = 1000;
        $unit->save();
    }
}
