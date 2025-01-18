<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Hash;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendaftarData = [
            [
                'nama' => 'Alana Zahira',
                'email' => 'alana_pendaftar@gmail.com',
                'password' => 'alana_pendaftarpass123', 
                'nohp' => '081232175132',
                'alamat' => 'Jalan Aster Nomor 6',
                'nim_nisn' => '24060122120024',
                'nik' => '3371526478802224',
                'ttl' => '2004-10-02', 
                'jenis_kelamin' => 'Perempuan', 
                'agama' => 'Islam', 
                'universitas_sekolah' => 'Universitas Diponegoro', 
                'jurusan' => 'Informatika', 
                'surat_permohonan' => null, 
                'proposal' => null, 
                'curriculum_vitae' => null, 
                'laporan' => null, 
                'periode' => null, 
                'id_bidang' => null, 
                'nama_bidang' => null, 
                'status_penerimaan' => null, 
                'status_kelulusan' => null, 
                'nip_pembina' => null, 
                'nip_pembimbing' => null,
            ],
            [
                'nama' => 'Abraham Parikesit',
                'email' => 'abraham_pendaftar@gmail.com',
                'password' => 'abraham_pendaftarpass123', 
                'nohp' => null,
                'alamat' => null,
                'nim_nisn' => '24060121130054',
                'nik' => '3374154789932415',
                'ttl' => null, 
                'jenis_kelamin' => null, 
                'agama' => null, 
                'universitas_sekolah' => 'Universitas Diponegoro', 
                'jurusan' => 'Informatika', 
                'surat_permohonan' => null, 
                'proposal' => null, 
                'curriculum_vitae' => null, 
                'laporan' => null, 
                'periode' => null, 
                'id_bidang' => null, 
                'nama_bidang' => null, 
                'status_penerimaan' => null, 
                'status_kelulusan' => null, 
                'nip_pembina' => null, 
                'nip_pembimbing' => null,
            ],
        ];

        foreach ($pendaftarData as $data) {
            $user = User::where('email', $data['email'])->first();

            if (!$user) {
                $userPendaftar = User::create([
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'no_hp' => $data['nohp'],
                    'alamat' => $data['alamat'],
                    'foto' => $data['foto'] ?? null,
                    'peran' => 'Pembimbing',
                ]);

                Pendaftar::create([
                    'nim_nisn' => $data['nim_nisn'], 
                    'user_id' => $userPendaftar->id, 
                    'nik' => $data['nik'],
                    'ttl', 'jenis_kelamin', 'agama', 'universitas_sekolah', 'jurusan', 'surat_permohonan', 'proposal', 'curriculum_vitae', 'laporan', 'periode', 'id_bidang', 'bidang', 'status_penerimaan', 'status_kelulusan', 'nip_pembina', 'nip_pembimbing'
                ]);
            }
        }
    }
}

