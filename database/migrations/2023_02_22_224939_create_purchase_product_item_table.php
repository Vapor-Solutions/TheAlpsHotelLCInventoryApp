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
        Schema::create('purchase_product_item', function (Blueprint $table) {
            $table->foreignId('purchase_id')->constrained();
            $table->foreignId('product_item_id')->unique()->constrained();
            $table->primary(['product_item_id', 'purchase_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_product_item');
    }
};
