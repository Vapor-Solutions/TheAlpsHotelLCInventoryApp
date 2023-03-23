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
        Schema::create('dispatch_product_item', function (Blueprint $table) {
            $table->foreignId('dispatch_id');
            $table->foreignId('product_item_id')->unique();
            $table->primary(['dispatch_id', 'product_item_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispatch_product_item');
    }
};
