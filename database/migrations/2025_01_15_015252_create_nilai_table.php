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
        Schema::create('nilai', function (Blueprint $table) {
            $table->char('nim', 14)->primary();
            $table->integer('kehadiran')->nullable();
            $table->integer('ketepatanwaktu')->nullable(); 
            $table->integer('sikapkerja_prosedurkerja')->nullable();
            $table->integer('kemampuanbekerjadlmtim')->nullable();
            $table->integer('kreativitaskerja')->nullable();
            $table->integer('inisiatifkerja')->nullable();
            $table->integer('kemampuankomunikasi')->nullable();
            $table->integer('kemampuanteknikal')->nullable();
            $table->integer('kepercayaandiri')->nullable();
            $table->integer('penampilan_kerapihan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
