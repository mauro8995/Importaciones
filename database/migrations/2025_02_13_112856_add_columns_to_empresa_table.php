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
        Schema::table('EMPRESA', function (Blueprint $table) {
            //
            $table->string('EMP_ID_DEPARTAMENTO', 2)->charset('latin1')->nullable();
            $table->string('EMP_ID_PROVINCIAS', 4)->charset('latin1')->nullable();
            $table->string('EMP_ID_DISTRITOS', 6)->charset('latin1')->nullable();

            // Si hay tablas de referencia, agregar las claves foráneas
            // $table->foreign('EMP_ID_DEPARTAMENTO')->references('id')->on('ubigeo_peru_departments');
            // $table->foreign('EMP_ID_PROVINCIAS')->references('id')->on('ubigeo_peru_provinces');
            // $table->foreign('EMP_ID_DISTRITOS')->references('id')->on('ubigeo_peru_districts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('EMPRESA', function (Blueprint $table) {
            //
        });
    }
};
