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
        Schema::create('ORDEN_CABECERA', function (Blueprint $table) {
            $table->id('ORD_ID');
            $table->bigInteger('ORD_PROVEEDOR_ID')->unsigned();
            $table->date('ORD_FECHA');
            $table->integer('ORD_SEMANA_ENTREGA');
            $table->string('ORD_DIRECCION');
            $table->string('ORD_TIPO_ENVIO');
            $table->bigInteger('ORD_USER_CREATE')->unsigned();
            $table->bigInteger('ORD_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('ORD_USER_DELETE')->unsigned()->nullable();
            $table->boolean('ORD_DELETE')->default(false);
            $table->timestamp('ORD_DATE_DELETE')->nullable();
            $table->timestamp('ORD_CREATED_AT')->nullable();
            $table->timestamp('ORD_UPDATED_AT')->nullable();

            // Relación con la tabla users sin cascade
            $table->foreign('ORD_USER_CREATE')->references('id')->on('users');
            $table->foreign('ORD_USER_UPDATE')->references('id')->on('users');
            $table->foreign('ORD_USER_DELETE')->references('id')->on('users');

            // Relación con PROVEEDOR
            $table->foreign('ORD_PROVEEDOR_ID')->references('PRO_ID')->on('PROVEEDOR');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ORDEN_CABECERA');
    }
};
