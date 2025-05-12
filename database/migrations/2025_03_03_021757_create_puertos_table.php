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
        Schema::create('PUERTO', function (Blueprint $table) {
            $table->id('PUE_ID');
            $table->string('PUE_NOMBRE');
            $table->string('PUE_DESCRIPCION');
            $table->string('PUE_ID_PAIS');
            $table->string('PUE_ID_DEPARTAMENTO');
           


            $table->bigInteger('PUE_USER_CREATE')->unsigned();
            $table->bigInteger('PUE_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('PUE_USER_DELETE')->unsigned()->nullable();
            $table->boolean('PUE_DELETE')->default(false);
            $table->timestamp('PUE_DELETE_AT')->nullable();
            $table->timestamp('PUE_CREATED_AT')->nullable();
            $table->timestamp('PUE_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('PUE_USER_CREATE')->references('id')->on('users');
            $table->foreign('PUE_USER_UPDATE')->references('id')->on('users');
            $table->foreign('PUE_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puertos');
    }
};
