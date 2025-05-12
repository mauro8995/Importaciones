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
        Schema::create('PRODUCTOS', function (Blueprint $table) {
            $table->id('PRO_ID');
            $table->string('PRO_NOMBRE');
            $table->text('PRO_DESCRIPCION')->nullable();
            $table->decimal('PRO_PRECIO', 10, 2);
            $table->integer('PRO_STOCK');
            $table->boolean('PRO_DELETE')->default(false);
            $table->timestamp('PRO_DATE_DELETE')->nullable();
            $table->unsignedBigInteger('PRO_USER_UPDATE')->nullable();
            $table->unsignedBigInteger('PRO_USER_DELETE')->nullable();
            $table->unsignedBigInteger('PRO_USER_CREATE');
            $table->timestamp('PRO_CREATED_AT')->useCurrent();
            $table->timestamp('PRO_UPDATED_AT')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PRODUCTOS');
    }
};
