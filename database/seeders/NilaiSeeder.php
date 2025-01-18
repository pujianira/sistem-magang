<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nilai;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nilaiData = [
            [
                '24060122120024', null, null, null, null,
                null, null, null, null,
                null, null
            ],
            [
                '24060121130054', null, null, null, null,
                null, null, null, null,
                null, null
            ],
        ];

        foreach ($nilaiData as $data) {
            Nilai::updateOrCreate(
                ['nim' => $data[0]],
                [
                    'kehadiran' => $data[1],
                    'ketepatanwaktu' => $data[2],
                    'sikapkerja_prosedurkerja' => $data[3], 
                    'kemampuanbekerjadlmtim' => $data[4],
                    'kreativitaskerja' => $data[5], 
                    'inisiatifkerja' => $data[6], 
                    'kemampuankomunikasi'=> $data[7], 
                    'kemampuanteknikal' => $data[8],
                    'kepercayaandiri' => $data[9], 
                    'penampilan_kerapihan' => $data[10],
                ]
            );
        }
    }
}
