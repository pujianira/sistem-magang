<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'kuota';

    protected $primaryKey = ['id_bidang', 'id_periode']; 
    public $incrementing = false;

    protected $fillable = ['id_bidang', 'id_periode', 'bulan', 'tahun'];
    
    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class, 'id_bidang', 'id_bidang');
    }

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'id_bidang', 'id_bidang');
    }
}
