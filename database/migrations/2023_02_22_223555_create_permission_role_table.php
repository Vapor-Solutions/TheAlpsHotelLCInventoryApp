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
        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignId('permission_id')->constrained();
            $table->foreignId('role_id')->constrained();
            $table->primary(['permission_id', 'role_id']);
            $table->timestamps();
        });

        foreach (App\Models\Permission::all() as $permission) {
            DB::table('permission_role')->insert([
                [
                    'permission_id' => $permission->id,
                    'role_id' => 1
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_role');
    }
};
