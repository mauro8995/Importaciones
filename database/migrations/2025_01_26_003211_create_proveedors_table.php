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
        Schema::create('PROVEEDOR', function (Blueprint $table) {
            $table->id('PRO_ID');
            $table->string('PRO_NOMBRE')->nullable();
            $table->string('PRO_TELEFONO')->nullable();
            $table->string('PRO_CORREO')->nullable();
            $table->string('PRO_DIRECCION')->nullable();
            $table->string('PRO_MONEDA')->nullable();
            $table->bigInteger('PRO_TIPO_CUENTA')->unsigned()->nullable();
            $table->bigInteger('PRO_BANCO')->unsigned()->nullable();
            $table->string('PRO_NUMERO_CUENTA')->nullable();
            $table->string('PRO_NOMBRE_REPRESENTANTE')->nullable();
            $table->bigInteger('PRO_TIPO_PROVEEDOR')->unsigned()->nullable();
            $table->bigInteger('PRO_RUBRO')->unsigned()->nullable();
            $table->boolean('PRO_ESTADO')->default(true);
            $table->bigInteger('PRO_USER_CREATE')->unsigned();
            $table->bigInteger('PRO_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('PRO_USER_DELETE')->unsigned()->nullable();
            $table->boolean('PRO_DELETE')->default(false);
            $table->timestamp('PRO_DATE_DELETE')->nullable();
            $table->timestamp('PRO_CREATED_AT')->nullable();
            $table->timestamp('PRO_UPDATED_AT')->nullable();

            // Relación con la tabla users sin cascade
            $table->foreign('PRO_USER_CREATE')->references('id')->on('users');
            $table->foreign('PRO_USER_UPDATE')->references('id')->on('users');
            $table->foreign('PRO_USER_DELETE')->references('id')->on('users');

            // Relaciones con otras tablas
            $table->foreign('PRO_TIPO_CUENTA')->references('TCU_ID')->on('TIPO_CUENTA');
            $table->foreign('PRO_BANCO')->references('BAN_ID')->on('BANCO');
            $table->foreign('PRO_TIPO_PROVEEDOR')->references('TPRO_ID')->on('TIPO_PROVEEDOR');
            $table->foreign('PRO_RUBRO')->references('RUB_ID')->on('RUBRO');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PROVEEDOR');
    }
};
