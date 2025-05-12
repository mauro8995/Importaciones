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
            $table->decimal('PRO_ALTO', 8, 2);
            $table->decimal('PRO_ANCHO', 8, 2);
            $table->decimal('PRO_PESO', 8, 2);
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
