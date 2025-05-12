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
        Schema::create('PAIS', function (Blueprint $table) {
            $table->id('PA_ID');
            $table->string('PA_NOMBRE');
            $table->bigInteger('PA_USER_CREATE')->unsigned();
            $table->bigInteger('PA_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('PA_USER_DELETE')->unsigned()->nullable();
            $table->boolean('PA_DELETE')->default(false);
            $table->timestamp('PA_DATE_DELETE')->nullable();
            $table->timestamp('PA_CREATED_AT')->nullable();
            $table->timestamp('PA_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('PA_USER_CREATE')->references('id')->on('users');
            $table->foreign('PA_USER_UPDATE')->references('id')->on('users');
            $table->foreign('PA_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PAIS');
    }
};
