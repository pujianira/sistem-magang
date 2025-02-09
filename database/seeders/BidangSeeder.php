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
            ['BID2', 'Bidang Pengembangan Komunikasi Publik'],
            ['BID3', 'Bidang Sistem Pemerintahan Berbasis Elektronik'],
            ['BID4', 'Bidang Pengelolaan Informasi dan Saluran Komunitas'],
            ['BID5', 'Bidang Pengelolaan Infrastruktur'],
            ['BID6', 'Bidang Statistik'],
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
