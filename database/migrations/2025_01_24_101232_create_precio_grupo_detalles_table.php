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
        Schema::create('PRECIO_GRUPO_DETALLES', function (Blueprint $table) {
            $table->id('PGD_ID');
            $table->unsignedBigInteger('PGD_ID_PRECIO_GRUPO');
            $table->foreign('PGD_ID_PRECIO_GRUPO')->references('PG_ID')->on('PRECIO_GRUPOS');
            $table->string('PGD_NOMBRE');
            $table->string('PGD_NOMBRE2')->nullable();
            $table->text('PGD_DESCRIPCION')->nullable();
            $table->decimal('PGD_TASA_INTERES', 5, 2)->default(0);
            $table->decimal('PGD_COSTO_IGV', 10, 2)->default(0);
            $table->unsignedBigInteger('PGD_USER_CREATE');
            $table->foreign('PGD_USER_CREATE')->references('id')->on('users');
            $table->unsignedBigInteger('PGD_USER_UPDATE')->nullable();
            $table->foreign('PGD_USER_UPDATE')->references('id')->on('users');
            $table->unsignedBigInteger('PGD_USER_DELETE')->nullable();
            $table->foreign('PGD_USER_DELETE')->references('id')->on('users');
            $table->timestamp('PGD_CREATED_AT');
            $table->timestamp('PGD_UPDATED_AT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRECIO_GRUPO_DETALLES');
    }
};
