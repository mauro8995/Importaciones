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
        Schema::create('PRODUCTOS_CODIGOS', function (Blueprint $table) {
            $table->id('PCO_ID');
            $table->string('PCO_CODIGO');
            $table->unsignedBigInteger('PCO_PRO_ID');
            $table->foreign('PCO_PRO_ID')->references('PRO_ID')->on('PRODUCTOS');
            $table->timestamp('PCO_CREATED_AT')->useCurrent();
            $table->timestamp('PCO_UPDATED_AT')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRODUCTOS_CODIGOS');
    }
};
