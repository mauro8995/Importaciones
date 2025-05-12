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
        Schema::create('BANCO', function (Blueprint $table) {
            $table->id('BAN_ID');
            $table->string('BAN_NOMBRE');
            $table->bigInteger('BAN_USER_CREATE')->unsigned();
            $table->bigInteger('BAN_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('BAN_USER_DELETE')->unsigned()->nullable();
            $table->boolean('BAN_DELETE')->default(false);
            $table->timestamp('BAN_DATE_DELETE')->nullable();
            $table->timestamp('BAN_CREATED_AT')->nullable();
            $table->timestamp('BAN_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('BAN_USER_CREATE')->references('id')->on('users');
            $table->foreign('BAN_USER_UPDATE')->references('id')->on('users');
            $table->foreign('BAN_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BANCO');
    }
};
