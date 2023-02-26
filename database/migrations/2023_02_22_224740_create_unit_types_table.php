<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unit_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('default');
            $table->timestamps();
        });

        DB::table('unit_types')->insert([
            [
                'title' => 'Mass',
                'default' => 'Gram (g)'
            ],
            [
                'title' => 'Volume',
                'default' => 'Litre (l)'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_types');
    }
};
