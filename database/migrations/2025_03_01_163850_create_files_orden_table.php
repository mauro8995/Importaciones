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
        Schema::create('FILES_MULTIMEDIA', function (Blueprint $table) {
            $table->id('FILE_ID');
            $table->string('FILE_TYPE');
            $table->string('FILE_RUTA');

            $table->bigInteger('FILE_USER_CREATE')->unsigned();
            $table->bigInteger('FILE_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('FILE_USER_DELETE')->unsigned()->nullable();
            $table->boolean('FILE_DELETE')->default(false);
            $table->timestamp('FILE_DATE_DELETE')->nullable();
            $table->timestamp('FILE_CREATED_AT')->nullable();
            $table->timestamp('FILE_UPDATED_AT')->nullable();

            // Relación con la tabla users
            $table->foreign('FILE_USER_CREATE')->references('id')->on('users');
            $table->foreign('FILE_USER_UPDATE')->references('id')->on('users');
            $table->foreign('FILE_USER_DELETE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_orden');
    }
};
