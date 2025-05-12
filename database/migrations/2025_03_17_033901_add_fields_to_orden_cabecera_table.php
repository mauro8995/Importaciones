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
        Schema::table('ORDEN_CABECERA', function (Blueprint $table) {
            //
            $table->bigInteger('ORD_ID_CLIENTE')->nullable();
            $table->foreign('ORD_ID_CLIENTE')->references('EMP_ID')->on('EMPRESA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ORDEN_CABECERA', function (Blueprint $table) {
            //
        });
    }
};
