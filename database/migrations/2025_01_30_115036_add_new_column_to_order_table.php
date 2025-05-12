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
        Schema::table('ORDEN_CABECERA', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('ORD_ID_PAIS_ORIGEN');
            $table->unsignedBigInteger('ORD_ID_PAIS_DESTINO');
            $table->dateTime('ORD_FECHA_LLEGANDA_TENTATIVA');
            $table->unsignedBigInteger('ORD_ID_MONEDA');
            $table->decimal('ORD_TOTAL_ORDEN',8,2);
            $table->unsignedBigInteger('ORD_ID_METODO_PAGO');


            $table->foreign('ORD_ID_PAIS_ORIGEN')->references('PA_ID')->on('PAIS');
            $table->foreign('ORD_ID_PAIS_DESTINO')->references('PA_ID')->on('PAIS');
            $table->foreign('ORD_ID_MONEDA')->references('MON_ID')->on('MONEDAS');
            $table->foreign('ORD_ID_METODO_PAGO')->references('MOT_ID')->on('METODO_PAGO');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ORDEN_CABECERA', function (Blueprint $table) {
            //
        });
    }
};
