<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';
    public $timestamps = false;

    protected $fillable = ['id_bidang', 'nama'];
    
    public function pembimbing()
    {
        return $this->hasMany(Pembimbing::class, 'id_bidang', 'id_bidang');
    }

    public function pendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'id_bidang', 'id_bidang');
    }
}
