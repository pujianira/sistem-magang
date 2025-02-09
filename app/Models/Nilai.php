<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'nim_nisn';
    public $timestamps = false;

    protected $fillable = ['nim_nisn', 'kehadiran', 'ketepatanwaktu', 'sikapkerja_prosedurkerja', 'kemampuanbekerjadlmtim',
                            'kreativitaskerja', 'inisiatifkerja', 'kemampuankomunikasi', 'kemampuanteknikal',
                            'kepercayaandiri', 'penampilan_kerapihan'];
    
    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class);
    }
}
