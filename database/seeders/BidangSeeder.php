<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bidang')->insert([
            ['id_bidang' => 'B01', 'nama' => 'Teknologi Informasi dan Komunikasi'],
            ['id_bidang' => 'B02', 'nama' => 'Statistik'],
            ['id_bidang' => 'B03', 'nama' => 'Informasi dan Komunikasi Publik'],
            ['id_bidang' => 'B04', 'nama' => 'E-Government'],
            ['id_bidang' => 'B05', 'nama' => 'Persandian dan Keamanan Informasi'],
            ['id_bidang' => 'B06', 'nama' => 'Sekretariat'],
        ]);
    }
}