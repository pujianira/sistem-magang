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
                'tempat_lahir' => 'Semarang', 
                'tanggal_lahir' => '2004-10-02', 
                'jenis_kelamin' => 'Perempuan', 
                'agama' => 'Islam', 
                'universitas_sekolah' => 'Universitas Diponegoro', 
                'jurusan' => 'Informatika', 
                'status_pendaftaran' => 'Belum Mendaftar', 
                'status_kelulusan' => 'Belum Mendaftar', 
                'nip_pembina' => '198002261784042001', 
            ],
            [
                'nama' => 'Abraham Parikesit',
                'email' => 'abraham_pendaftar@gmail.com',
                'password' => 'abraham_pendaftarpass123', 
                'nim_nisn' => '24060121130054',
                'nik' => '3374154789932415',
                'universitas_sekolah' => 'Universitas Diponegoro', 
                'jurusan' => 'Informatika', 
                'status_pendaftaran' => 'Belum Mendaftar', 
                'status_kelulusan' => 'Belum Mendaftar', 
                'nip_pembina' => '198002261784042001', 
            ],
            [
                'nama' => 'Launa Deandra',
                'email' => 'launa_pendaftar@gmail.com',
                'password' => 'launa_pendaftarpass123',
                'nohp' => '085135164221',
                'alamat' => 'Jalan Mawar Nomor 2', 
                'nim_nisn' => '24060122120051',
                'nik' => '3372162689873234',
                'tempat_lahir' => 'Jakarta', 
                'tanggal_lahir' => '2004-06-01', 
                'jenis_kelamin' => 'Perempuan', 
                'agama' => 'Islam', 
                'universitas_sekolah' => 'Universitas Diponegoro', 
                'jurusan' => 'Informatika', 
                'bulan_mulai' => 'Januari', 
                'tahun_mulai' => 2025, 
                'durasi' => '3',
                'id_bidang' => 'BID3', 
                'nama_bidang' => 'Informasi dan Komunikasi Publik', 
                'tanggal_pendaftaran' => '2024-12-10',
                'status_pendaftaran' => 'Diterima', 
                'status_kelulusan' => 'Aktif',
                'nip_pembina' => '198002261784042001', 
                'nip_pembimbing' => '199012021643029081',
            ],
        ];

        foreach ($pendaftarData as $data) {
            $user = User::where('email', $data['email'])->first();

            if (!$user) {
                $userPendaftar = User::create([
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'no_hp' => $data['nohp'] ?? null,
                    'alamat' => $data['alamat'] ?? null,
                    'foto' => $data['foto'] ?? null,
                    'peran' => 'Pendaftar',
                ]);

                Pendaftar::create([
                    'nim_nisn' => $data['nim_nisn'], 
                    'user_id' => $userPendaftar->id, 
                    'nik' => $data['nik'] ?? null,
                    'tempat_lahir' => $data['tempat_lahir'] ?? null, 
                    'tanggal_lahir' => $data['tanggal_lahir'] ?? null, 
                    'jenis_kelamin' => $data['jenis_kelamin'] ?? null, 
                    'agama' => $data['agama'] ?? null, 
                    'universitas_sekolah' => $data['universitas_sekolah'], 
                    'jurusan' => $data['jurusan'], 
                    'surat_permohonan' => $data['surat_permohonan'] ?? null, 
                    'proposal' => $data['proposal'] ?? null, 
                    'curriculum_vitae' => $data['curriculum_vitae'] ?? null, 
                    'laporan' => $data['laporan'] ?? null, 
                    'judul_laporan' => $data['judul_laporan'] ?? null, 
                    'jenis_karya' => $data['jenis_karya'] ?? null, 
                    'deskripsi_karya' => $data['deskripsi_karya'] ?? null, 
                    'tanggal_kirimlaporan' => $data['tanggal_kirimlaporan'] ?? null,
                    'bulan_mulai' => $data['bulan_mulai'] ?? null, 
                    'tahun_mulai' => $data['tahun_mulai'] ?? null, 
                    'durasi' => $data['durasi'] ?? null,
                    'id_bidang' => $data['id_bidang'] ?? null, 
                    'nama_bidang' => $data['nama_bidang'] ?? null, 
                    'tanggal_pendaftaran' => $data['tanggal_pendaftaran'] ?? null,
                    'status_pendaftaran' => $data['status_pendaftaran'], 
                    'status_kelulusan' => $data['status_kelulusan'], 
                    'nip_pembina' => $data['nip_pembina'], 
                    'nip_pembimbing' => $data['nip_pembimbing'] ?? null,
                ]);
            }
        }
    }
}

