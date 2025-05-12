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
            $table->unsignedBigInteger('PRO_ID_PROVEEDOR')->nullable(); // Cambia el nombre y tipo según tus necesidades
            $table->foreign('PRO_ID_PROVEEDOR')->references('PRO_ID')->on('PROVEEDOR');
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
