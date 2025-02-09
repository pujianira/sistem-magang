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
        Schema::create('kuota', function (Blueprint $table) {
            $table->string('id_bidang');
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang')->onDelete('cascade');
            $table->string('id_periode');
            $table->foreign('id_periode')->references('id_periode')->on('periode')->onDelete('cascade');
            $table->integer('kuota_pendaftar');

            $table->primary(['id_bidang', 'id_periode']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuota');
    }
};
