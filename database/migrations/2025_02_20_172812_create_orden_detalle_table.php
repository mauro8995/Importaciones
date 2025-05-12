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
        
            Schema::create('ORDEN_DETALLE', function (Blueprint $table) {
                $table->id('ORD_DET_ID');
                $table->bigInteger('ORD_ID_ORDEN_CABECERA')->unsigned();
                $table->bigInteger('ORD_DET_PRODUCTO_ID')->nullable();
                $table->string('ORD_DET_CODE_COPE')->nullable();
                $table->string('ORD_DET_COD_CLIENTE')->nullable();
                $table->string('ORD_DET_UNI_MEDIDA')->nullable();
                $table->integer('ORD_DET_CANTIDAD')->nullable();
                $table->decimal('ORD_DET_PRECIO', 10, 2)->nullable();
                $table->integer('ORD_DET_SEMANAS')->nullable();
                $table->decimal('ORD_DET_CIF_VALOR', 10, 3)->nullable();
                $table->decimal('ORD_DET_SALES_FACTOR', 10, 3)->nullable();
                $table->decimal('ORD_DET_AD_VALOREM', 10, 2)->nullable();
                $table->decimal('ORD_DET_AD_VALOREM_TOTAL', 10, 2)->nullable();
                $table->decimal('ORD_DET_PRECIO_UNI', 10, 2)->nullable();
                $table->decimal('ORD_DET_PRECIO_UNI_TOTAL', 10, 2)->nullable();
                $table->decimal('ORD_DET_UNIDAD_MAKE_UP', 10, 2)->nullable();
                $table->decimal('ORD_DET_UNIDAD_MAKE_UP_TOTAL', 10, 2)->nullable();
                $table->decimal('ORD_DET_SALE_SALE', 10, 2)->nullable();
                $table->decimal('ORD_DET_SALE_SALE_TOTAL', 10, 2)->nullable();
                $table->decimal('ORD_DET_VALOR_TOTAL', 10, 2)->nullable();
                $table->json('ORD_DET_INFO')->nullable(); // Se almacena toda la info en JSON
                $table->json('ORD_DET_CALCULO')->nullable(); // Se almacena el cálculo en JSON
                
                $table->foreign('ORD_ID_ORDEN_CABECERA')->references('ORD_ID')->on('ORDEN_CABECERA');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ORDEN_DETALLE');
    }
};
