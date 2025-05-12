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
        Schema::table('FILES_MULTIMEDIA', function (Blueprint $table) {
            //
            $table->string('FILE_CODE');
            $table->string('FILE_ID_EXTERNO');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('FILES_MULTIMEDIA', function (Blueprint $table) {
            //
        });
    }
};
