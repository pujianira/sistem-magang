<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pembina;
use Illuminate\Support\Facades\Hash;

class PembinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembinaData = [
            [
                'nama' => 'Nirwana',
                'email' => 'nirwana_pembina@gmail.com',
                'password' => 'nirwana_pembinapass123', 
                'no_hp' => '082536471812',
                'alamat' => 'Jalan Melati Nomor 2',
                'nip' => '198002261784042001',
            ],
            [
                'nama' => 'Ahmadi',
                'email' => 'ahmadi_pembina@gmail.com',
                'password' => 'ahmadi_pembinapass123', 
                'no_hp' => '081525213845',
                'alamat' => 'Jalan Tulip Nomor 8',
                'nip' => '198201251673022041',
            ],
        ];

        foreach ($pembinaData as $data) {
            $user = User::where('email', $data['email'])->first();

            if (!$user) {
                $userPembina = User::create([
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'no_hp' => $data['no_hp'],
                    'alamat' => $data['alamat'],
                    'foto' => $data['foto'] ?? null,
                    'peran' => 'Pembina',
                ]);

                Pembina::create([
                    'nip' => $data['nip'],
                    'user_id' => $userPembina->id, 
                ]);
            }
        }
    }
}