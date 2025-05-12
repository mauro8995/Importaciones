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
        Schema::table('PRODUCTOS', function (Blueprint $table) {
            //
            $table->string('PRO_CODE_COPE');
            $table->string('PRO_CODE_INTERNO_CLIENTE');
            $table->string('PRO_CODE_PARTE');
            $table->unsignedBigInteger('PRO_ID_UNIDAD_MEDIDA');
            $table->foreign('PRO_ID_UNIDAD_MEDIDA')->references('UNI_ID')->on('UNIDAD_MEDIDA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('PRODUCTOS', function (Blueprint $table) {
            //
        });
    }
};
