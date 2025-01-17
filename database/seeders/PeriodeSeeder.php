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
            ['bulan' => 'Februari', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'Maret', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'April', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'Mei', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'Juni', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'Juli', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'Agustus', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'September', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'Oktober', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'November', 'tahun' => 2025, 'kuota_pendaftar' => 50],
            ['bulan' => 'Desember', 'tahun' => 2025, 'kuota_pendaftar' => 50],
        ]);
    }
}