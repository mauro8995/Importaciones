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
            $table->decimal('PRO_MARGEN', 10, 3)->nullable(); // Reemplaza COLUMN_NAME con el nombre adecuado
            $table->decimal('PRO_ARANCELES', 10, 3)->nullable();
            $table->integer('PRO_SEMANAS_ENTREGA')->nullable();
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
