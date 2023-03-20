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
        Schema::create('product_purchase_order', function (Blueprint $table) {
            $table->foreignId('product_description_id')->constrained();
            $table->foreignId('purchase_order_id')->constrained();
            $table->primary(['product_description_id','purchase_order_id']);
            $table->float('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_purchase_order');
    }
};
