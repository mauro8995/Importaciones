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
        Schema::create('ORDEN_DETALLE_ESTADO', function (Blueprint $table) {
            $table->id('ORDS_IDE');
            $table->string('ORDS_NOMBRE');
            $table->string('ORDS_COLOR');
            $table->string('ORDS_ICONO');
           


            $table->bigInteger('ORDS_USER_CREATE')->unsigned();
            $table->bigInteger('ORDS_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('ORDS_USER_DELETE')->unsigned()->nullable();
            $table->boolean('ORDS_DELETE')->default(false);
            $table->timestamp('ORDS_DELETE_AT')->nullable();
            $table->timestamp('ORDS_CREATED_AT')->nullable();
            $table->timestamp('ORDS_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('ORDS_USER_CREATE')->references('id')->on('users');
            $table->foreign('ORDS_USER_UPDATE')->references('id')->on('users');
            $table->foreign('ORDS_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ORDEN_DETALLE_ESTADO');
    }
};
