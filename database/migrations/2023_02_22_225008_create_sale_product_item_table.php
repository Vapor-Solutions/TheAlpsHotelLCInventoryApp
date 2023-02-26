<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_product_item', function (Blueprint $table) {
            $table->foreignId('sale_id');
            $table->foreignId('product_item_id');
            $table->primary(['sale_id', 'product_item_id']);
            $table->float('sale_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_product_item');
    }
};
