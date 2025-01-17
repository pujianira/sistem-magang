<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bidang;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bidangData = [
            ['BID1', 'Teknologi Informasi dan Komunikasi'],
            ['BID2', 'Statistik'],
            ['BID3', 'Informasi dan Komunikasi Publik'],
            ['BID4', 'E-Government'],
            ['BID5', 'Persandian dan Keamanan Informasi'],
            ['BID6', 'Sekretariat'],
        ];

        foreach ($bidangData as $data) {
            Bidang::updateOrCreate(
                ['id_bidang' => $data[0]],
                [
                    'nama' => $data[1],
                ]
            );
        }
    }
}
