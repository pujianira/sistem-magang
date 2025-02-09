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
            $table->char('nik', 16)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 10)->nullable();
            $table->string('agama', 30)->nullable();
            $table->string('universitas_sekolah', 50)->nullable();
            $table->string('jurusan', 50)->nullable();
            $table->string('surat_permohonan')->nullable();
            $table->string('proposal')->nullable();
            $table->string('curriculum_vitae')->nullable();
            $table->string('laporan')->nullable();
            $table->string('judul_laporan')->nullable();
            $table->string('jenis_karya')->nullable();
            $table->string('deskripsi_karya')->nullable();
            $table->date('tanggal_kirimlaporan')->nullable();
            $table->string('id_bidang', 10)->nullable();
            $table->foreign('id_bidang')->references('id_bidang')->on('bidang')->onDelete('cascade');
            $table->string('nama_bidang', 100)->nullable();;
            $table->string('bulan_mulai')->nullable();
            $table->integer('tahun_mulai')->nullable();
            $table->integer('durasi')->nullable();
            $table->date('tanggal_pendaftaran')->nullable();
            $table->enum('status_pendaftaran', ['Belum Mendaftar', 'Menunggu', 'Diterima', 'Ditolak']);
            $table->enum('status_kelulusan', ['Belum Mendaftar', 'Menunggu', 'Aktif', 'Proses Pemeriksaan', 'Lulus', 'Tidak Lulus']);
            $table->string('nip_pembina', 18)->nullable();
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
