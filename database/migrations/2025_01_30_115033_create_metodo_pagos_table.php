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
        Schema::create('METODO_PAGO', function (Blueprint $table) {
            $table->id('MOT_ID');
            $table->string('MOT_NOMBRE');
            $table->bigInteger('MOT_USER_CREATE')->unsigned();
            $table->bigInteger('MOT_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('MOT_USER_DELETE')->unsigned()->nullable();
            $table->boolean('MOT_DELETE')->default(false);
            $table->timestamp('MOT_DATE_DELETE')->nullable();
            $table->timestamp('MOT_CREATED_AT')->nullable();
            $table->timestamp('MOT_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('MOT_USER_CREATE')->references('id')->on('users');
            $table->foreign('MOT_USER_UPDATE')->references('id')->on('users');
            $table->foreign('MOT_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('METODO_PAGO');
    }
};
