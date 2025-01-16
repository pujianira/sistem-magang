<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    public $timestamps = false;

    protected $fillable = ['nim', 'kehadiran', 'ketepatanwaktu', 'sikapkerja_prosedurkerja', 'kemampuanbekerjadlmtim',
                            'kreativitaskerja', 'inisiatifkerja', 'kemampuankomunikasi', 'kemampuanteknikal',
                            'kepercayaandiri', 'penampilan_kerapihan'];
    
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
