<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    protected $table = 'pembimbing';
    public $timestamps = false;

    protected $fillable = ['nip', 'user_id', 'nama_bidang', 'id_bidang', 'kuota_pendaftar'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pendaftar()
    {
        return $this->hasMany(Pembina::class, 'nip', 'nip_pembimbing');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id_bidang');
    }
}
