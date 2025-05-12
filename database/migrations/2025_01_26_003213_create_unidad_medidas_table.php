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
        Schema::create('UNIDAD_MEDIDA', function (Blueprint $table) {
            $table->id('UNI_ID');
            $table->string('UNI_NOMBRE');
            $table->bigInteger('UNI_USER_CREATE')->unsigned();
            $table->bigInteger('UNI_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('UNI_USER_DELETE')->unsigned()->nullable();
            $table->boolean('UNI_DELETE')->default(false);
            $table->timestamp('UNI__DATE_DELETE')->nullable();
            $table->timestamp('UNI_CREATED_AT')->nullable();
            $table->timestamp('UNI_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('UNI_USER_CREATE')->references('id')->on('users');
            $table->foreign('UNI_USER_UPDATE')->references('id')->on('users');
            $table->foreign('UNI_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('UNIDAD_MEDIDA');
    }
};
