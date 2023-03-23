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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        DB::table('departments')->insert([
            [
                'title'=>'Housekeeping'
            ],
            [
                'title'=>'Accounts'
            ],
            [
                'title'=>'Information Technology'
            ],
            [
                'title'=>'Supply Chain & Procurement'
            ],
            [
                'title'=>'Front Office'
            ],
            [
                'title'=>'Food, Beverage and Service'
            ],
            [
                'title'=>'Kitchen'
            ],
            [
                'title'=>'Security'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
