<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';

    protected $fillable = ['bulan', 'tahun', 'kuota_pendaftar'];
    
    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class, 'id_bidang', 'id_bidang');
    }

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'id_bidang', 'id_bidang');
    }
}
