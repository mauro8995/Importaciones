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
            $table->string('ORD_ID_DEPARTAMENTO', 2)->charset('latin1')->nullable();
            $table->string('ORD_ID_PROVINCIAS', 4)->charset('latin1')->nullable();
            $table->string('ORD_ID_DISTRITOS', 6)->charset('latin1')->nullable();
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
