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
        Schema::create('TIPO_CUENTA', function (Blueprint $table) {
            $table->id('TCU_ID');
            $table->string('TCU_NOMBRE');
            $table->bigInteger('TCU_USER_CREATE')->unsigned();
            $table->bigInteger('TCU_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('TCU_USER_DELETE')->unsigned()->nullable();
            $table->boolean('TCU_DELETE')->default(false);
            $table->timestamp('TCU_DATE_DELETE')->nullable();
            $table->timestamp('TCU_CREATED_AT')->nullable();
            $table->timestamp('TCU_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('TCU_USER_CREATE')->references('id')->on('users');
            $table->foreign('TCU_USER_UPDATE')->references('id')->on('users');
            $table->foreign('TCU_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIPO_CUENTA');
    }
};
