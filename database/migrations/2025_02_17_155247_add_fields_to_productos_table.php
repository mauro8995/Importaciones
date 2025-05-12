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
        Schema::table('PRODUCTOS', function (Blueprint $table) {
            //
            $table->decimal('PRO_DENSIDAD', 10, 3)->nullable();
            $table->decimal('PRO_PROFUNDIDAD', 10, 3)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PRODUCTOS', function (Blueprint $table) {
            //
        });
    }
};
