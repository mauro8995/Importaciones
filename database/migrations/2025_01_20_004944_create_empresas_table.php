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
        Schema::create('EMPRESA', function (Blueprint $table) {
            $table->bigIncrements('EMP_ID');
            $table->string('EMP_NAME');
            $table->boolean('EMP_DELETE')->default(false);
            $table->timestamp('EMP_DATE_DELETE')->nullable();
            $table->bigInteger('EMP_USER_UPDATE')->unsigned()->nullable();
            $table->bigInteger('EMP_USER_DELETE')->unsigned()->nullable();
            $table->bigInteger('EMP_USER_CREATE')->unsigned()->nullable();
            $table->timestamp('EMP_CREATED_AT')->useCurrent();
            $table->timestamp('EMP_UPDATED_AT')->useCurrent()->useCurrentOnUpdate();
            $table->timestamp('EMP_DELETED_AT')->nullable();

            // Additional columns
            $table->string('EMP_RUC')->unique();
            $table->string('EMP_RAZON_SOCIAL')->nullable();
            $table->string('EMP_NOMBRE_COMERCIAL')->nullable();
            $table->string('EMP_DIRECCION_FISCAL')->nullable();;
            $table->string('EMP_DISTRITO')->nullable();;
            $table->string('EMP_TELEFONO')->nullable();;
            $table->string('EMP_EMAIL')->nullable();;
            $table->string('EMP_ESTADO_SUNAT')->default('ACTIVO')->nullable();
            $table->string('EMP_CONDICION_SUNAT')->default('HABIDO')->nullable();
            $table->string('EMP_REGIMEN_TRIBUTARIO')->nullable();
            $table->string('EMP_LOGO_PATH')->nullable();
            $table->string('EMP_REPRESENTANTE_LEGAL')->nullable();
            $table->string('EMP_DNI_REPRESENTANTE')->nullable();
            $table->boolean('EMP_IS_ACTIVE')->default(true)->nullable();

            // Foreign key constraints
            $table->foreign('EMP_USER_UPDATE')->references('id')->on('users');
            $table->foreign('EMP_USER_DELETE')->references('id')->on('users');
            $table->foreign('EMP_USER_CREATE')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
