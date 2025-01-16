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
            $table->integer('kehadiran');
            $table->integer('ketepatanwaktu'); 
            $table->integer('sikapkerja_prosedurkerja');
            $table->integer('kemampuanbekerjadlmtim');
            $table->integer('kreativitaskerja');
            $table->integer('inisiatifkerja');
            $table->integer('kemampuankomunikasi');
            $table->integer('kemampuanteknikal');
            $table->integer('kepercayaandiri');
            $table->integer('penampilan_kerapihan');
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
