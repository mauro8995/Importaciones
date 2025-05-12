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
        Schema::table('ORDEN_DETALLE', function (Blueprint $table) {
            //
            $table->bigInteger('ORD_ID_ESTADO')->nullable();
            $table->foreign('ORD_ID_ESTADO')->references('ORDS_IDE')->on('ORDEN_DETALLE_ESTADO');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ORDEN_DETALLE', function (Blueprint $table) {
            //
        });
    }
};
