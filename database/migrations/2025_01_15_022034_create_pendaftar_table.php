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
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->char('nim_nisn', 14)->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->char('nik', 16);
            $table->date('ttl')->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('agama', 30)->nullable();
            $table->string('universitas_sekolah', 50);
            $table->string('jurusan', 50);
            $table->binary('surat_permohonan')->nullable();
            $table->binary('proposal')->nullable();
            $table->binary('curriculum_vitae')->nullable();
            $table->binary('laporan')->nullable();
            $table->string('id_bidang', 10)->nullable();
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang')->onDelete('cascade');
            $table->string('nama_bidang', 50)->nullable();;
            $table->string('bulan_mulai')->nullable();
            $table->integer('tahun_mulai')->nullable();
            $table->integer('durasi')->nullable();
            $table->timestamp('tanggal_pendaftaran')->nullable();
            $table->enum('status_pendaftaran', ['Belum Mendaftar', 'Menunggu', 'Diterima', 'Ditolak']);
            $table->enum('status_kelulusan', ['Belum Mendaftar', 'Aktif', 'Lulus', 'Tidak Lulus']);
            $table->string('nip_pembina', 18);
            $table->string('nip_pembimbing', 18)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftar');
    }
};
