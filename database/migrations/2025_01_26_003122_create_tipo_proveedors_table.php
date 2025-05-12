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
        Schema::create('TIPO_PROVEEDOR', function (Blueprint $table) {
            $table->id('TPRO_ID');
            $table->string('TPRO_NOMBRE');
            $table->bigInteger('TPRO_USER_CREATE')->unsigned();
            $table->bigInteger('TPRO_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('TPRO_USER_DELETE')->unsigned()->nullable();
            $table->boolean('TPRO_DELETE')->default(false);
            $table->timestamp('TPRO_DATE_DELETE')->nullable();
            $table->timestamp('TPRO_CREATED_AT')->nullable();
            $table->timestamp('TPRO_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('TPRO_USER_CREATE')->references('id')->on('users');
            $table->foreign('TPRO_USER_UPDATE')->references('id')->on('users');
            $table->foreign('TPRO_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIPO_PROVEEDOR');
    }
};
