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
        Schema::create('ORDEN_ESTADO', function (Blueprint $table) {
            $table->id('ODES_ID');
            $table->string('ODES_NOMBRE');
            $table->string('ODES_COLOR')->nullable();
            $table->string('ODES_ICONO')->nullable();           


            $table->bigInteger('ODES_USER_CREATE')->unsigned();
            $table->bigInteger('ODES_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('ODES_USER_DELETE')->unsigned()->nullable();
            $table->boolean('ODES_DELETE')->default(false);
            $table->timestamp('ODES_DELETE_AT')->nullable();
            $table->timestamp('ODES_CREATED_AT')->nullable();
            $table->timestamp('ODES_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('ODES_USER_CREATE')->references('id')->on('users');
            $table->foreign('ODES_USER_UPDATE')->references('id')->on('users');
            $table->foreign('ODES_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ORDEN_ESTADO');
    }
};
