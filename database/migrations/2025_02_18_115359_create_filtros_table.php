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
        Schema::create('FILTROS', function (Blueprint $table) {
            $table->id('FIL_ID');
            $table->string('FIL_NOMBRE');
            $table->string('FIL_CONSULTA_SQL');
            $table->string('FIL_COLUMNAS_FILTRO');
            $table->bigInteger('FIL_USER_CREATE')->unsigned();
            $table->bigInteger('FIL_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('FIL_USER_DELETE')->unsigned()->nullable();
            $table->boolean('FIL_DELETE')->default(false);
            $table->timestamp('FIL_DATE_DELETE')->nullable();
            $table->timestamp('FIL_CREATED_AT')->nullable();
            $table->timestamp('FIL_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('FIL_USER_CREATE')->references('id')->on('users');
            $table->foreign('FIL_USER_UPDATE')->references('id')->on('users');
            $table->foreign('FIL_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filtros');
    }
};
