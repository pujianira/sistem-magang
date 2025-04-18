<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    public $timestamps = false;
    protected $primaryKey = 'nim_nisn';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = ['nim_nisn', 'user_id', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'universitas_sekolah', 'jurusan', 'surat_permohonan', 'proposal', 'curriculum_vitae', 'laporan', 'judul_laporan', 
                    'jenis_karya', 'deskripsi_karya', 'tanggal_kirimlaporan', 'bulan_mulai', 'tahun_mulai', 'durasi', 'id_bidang', 'nama_bidang', 'tanggal_pendaftaran', 'status_pendaftaran', 'status_kelulusan', 'nip_pembina', 'nip_pembimbing'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembina()
    {
        return $this->belongsTo(Pembina::class, 'nip', 'nip_pembina');
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class, 'nip', 'nip_pembimbing');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id_bidang');
    }

    public function nilai()
    {
        return $this->hasOne(Pendaftar::class, 'nim_nisn', 'nim_nisn');
    }
}
