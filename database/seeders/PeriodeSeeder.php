<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periode')->insert([
            ['id_periode' => 'FEB25', 'bulan' => 'Februari', 'tahun' => 2025],
            ['id_periode' => 'MAR25', 'bulan' => 'Maret', 'tahun' => 2025],
            ['id_periode' => 'APR25', 'bulan' => 'April', 'tahun' => 2025],
            ['id_periode' => 'MEI25', 'bulan' => 'Mei', 'tahun' => 2025],
            ['id_periode' => 'JUN25', 'bulan' => 'Juni', 'tahun' => 2025],
            ['id_periode' => 'JUL25', 'bulan' => 'Juli', 'tahun' => 2025],
            ['id_periode' => 'AGU25', 'bulan' => 'Agustus', 'tahun' => 2025],
            ['id_periode' => 'SEP25', 'bulan' => 'September', 'tahun' => 2025],
            ['id_periode' => 'OKT25', 'bulan' => 'Oktober', 'tahun' => 2025],
            ['id_periode' => 'NOV25', 'bulan' => 'November', 'tahun' => 2025],
            ['id_periode' => 'DES25', 'bulan' => 'Desember', 'tahun' => 2025],
        ]);
    }
}