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
        Schema::create('CONFIGURACION', function (Blueprint $table) {
            $table->id('CONF_ID');
            $table->string( 'CONF_KEY')->nullable();
            $table->string( 'CONF_VALUE')->nullable();
            $table->bigInteger('CONF_USER_CREATE')->unsigned();
            $table->bigInteger('CONF_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('CONF_USER_DELETE')->unsigned()->nullable();
            $table->boolean('CONF_DELETE')->default(false);
            $table->timestamp('CONF_DATE_DELETE')->nullable();
            $table->timestamp('CONF_CREATED_AT')->nullable();
            $table->timestamp('CONF_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('CONF_USER_CREATE')->references('id')->on('users');
            $table->foreign('CONF_USER_UPDATE')->references('id')->on('users');
            $table->foreign('CONF_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracions');
    }
};
