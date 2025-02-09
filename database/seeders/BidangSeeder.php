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
            ['BID1', 'Sekretariat'],
            ['BID2', 'Pengembangan Komunikasi Publik'],
            ['BID3', 'Sistem Pemerintahan Berbasis Elektronik'],
            ['BID4', 'Pengelolaan Informasi dan Saluran Komunikasi Publik'],
            ['BID5', 'Pengelolaan Infrastruktur'],
            ['BID6', 'Statistik'],
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
