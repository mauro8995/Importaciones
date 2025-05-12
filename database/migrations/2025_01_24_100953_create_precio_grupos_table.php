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
        Schema::create('PRECIO_GRUPOS', function (Blueprint $table) {
            $table->id('PG_ID');
            $table->string('PG_NOMBRE');
            $table->text('PG_DESCRIPCION')->nullable();
            $table->unsignedBigInteger('PG_USER_CREATE');
            $table->foreign('PG_USER_CREATE')->references('id')->on('users');
            $table->unsignedBigInteger('PG_USER_UPDATE')->nullable();
            $table->foreign('PG_USER_UPDATE')->references('id')->on('users');
            $table->unsignedBigInteger('PG_USER_DELETE')->nullable();
            $table->foreign('PG_USER_DELETE')->references('id')->on('users');
            $table->timestamp('PG_CREATED_AT');
            $table->timestamp('PG_UPDATED_AT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRECIO_GRUPOS');
    }
};
