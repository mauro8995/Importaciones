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
        Schema::create('FILTER_MODEL', function (Blueprint $table) {
            $table->id('FIL_IDE');
            $table->string('FIL_MODEL');
            $table->string('FIL_COLUMN');
            $table->string('FIL_DATA_TYPE'); // Ej.: string, int, date
            $table->boolean('FIL_DELETE')->default(false); // Por defecto, no eliminado
            $table->timestamp('FIL_DATE_DELETE')->nullable(); // Fecha de eliminación
            $table->unsignedBigInteger('FIL_USER_UPDATE')->nullable(); // Relación con BIGINT
            $table->unsignedBigInteger('FIL_USER_DELETE')->nullable(); // Usuario que elimina
            $table->unsignedBigInteger('FIL_USER_CREATE')->nullable(); // Relación con BIGINT
            $table->timestamp('FIL_CREATED_AT')->nullable(); // Prefijo para created_at
            $table->timestamp('FIL_UPDATED_AT')->nullable(); // Prefijo para updated_at

                // Definir claves foráneas
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
        Schema::dropIfExists('FILTER_MODEL');
    }
};
