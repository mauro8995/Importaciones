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
        Schema::create('RUBRO', function (Blueprint $table) {
            $table->id('RUB_ID');
            $table->string('RUB_NOMBRE');
            $table->bigInteger('RUB_USER_CREATE')->unsigned();
            $table->bigInteger('RUB_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('RUB_USER_DELETE')->unsigned()->nullable();
            $table->boolean('RUB_DELETE')->default(false);
            $table->timestamp('RUB_DATE_DELETE')->nullable();
            $table->timestamp('RUB_CREATED_AT')->nullable();
            $table->timestamp('RUB_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('RUB_USER_CREATE')->references('id')->on('users');
            $table->foreign('RUB_USER_UPDATE')->references('id')->on('users');
            $table->foreign('RUB_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RUBRO');
    }
};
