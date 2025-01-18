<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pembimbing;
use Illuminate\Support\Facades\Hash;

class PembimbingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembimbingData = [
            [
                'nama' => 'Alaskara Cahya',
                'email' => 'alaskara_pembimbing@gmail.com',
                'password' => 'alaskara_pembimbingpass123', 
                'nohp' => '081245471022',
                'alamat' => 'Jalan Anggrek Nomor 4',
                'nip' => '199012021643029081',
                'nama_bidang' => 'Informasi dan Komunikasi Publik', 
                'id_bidang' => 'BID3', 
                'kuota_pendaftar' => 20,
            ],
            [
                'nama' => 'Ghaaziy Ahmad',
                'email' => 'ghaaziy_pembimbing@gmail.com',
                'password' => 'ghaaziy_pembimbingpass123', 
                'nohp' => '082135112735',
                'alamat' => 'Jalan Kenanga Nomor 1',
                'nip' => '199703101243112031',
                'nama_bidang' => 'E-Government', 
                'id_bidang' => 'BID4', 
                'kuota_pendaftar' => 20,
            ],
        ];

        foreach ($pembimbingData as $data) {
            $user = User::where('email', $data['email'])->first();

            if (!$user) {
                $userPembimbing = User::create([
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'no_hp' => $data['nohp'],
                    'alamat' => $data['alamat'],
                    'foto' => $data['foto'] ?? null,
                    'peran' => 'Pembimbing',
                ]);

                Pembimbing::create([
                    'nip' => $data['nip'],
                    'user_id' => $userPembimbing->id, 
                    'nama_bidang' => $data['nama_bidang'],
                    'id_bidang' => $data['id_bidang'],
                    'kuota_pendaftar' => $data['kuota_pendaftar'],
                ]);
            }
        }
    }
}