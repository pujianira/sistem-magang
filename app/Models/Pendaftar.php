<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    public $timestamps = false;

    protected $fillable = ['nim_nisn', 'user_id', 'nik', 'ttl', 'jenis_kelamin', 'agama', 'universitas_sekolah', 'jurusan', 'surat_permohonan', 'proposal', 'curriculum_vitae', 'laporan', 'periode', 'id_bidang', 'bidang', 'status_penerimaan', 'status_kelulusan', 'nip_pembina', 'nip_pembimbing'];
    
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
        return $this->hasOne(Nilai::class);
    }
}
