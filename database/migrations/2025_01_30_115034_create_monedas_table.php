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
        Schema::create('MONEDAS', function (Blueprint $table) {
            $table->id('MON_ID');
            $table->string('MON_NOMBRE');
            $table->bigInteger('MON_USER_CREATE')->unsigned();
            $table->bigInteger('MON_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('MON_USER_DELETE')->unsigned()->nullable();
            $table->boolean('MON_DELETE')->default(false);
            $table->timestamp('MON_DATE_DELETE')->nullable();
            $table->timestamp('MON_CREATED_AT')->nullable();
            $table->timestamp('MON_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('MON_USER_CREATE')->references('id')->on('users');
            $table->foreign('MON_USER_UPDATE')->references('id')->on('users');
            $table->foreign('MON_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MONEDAS');
    }
};
