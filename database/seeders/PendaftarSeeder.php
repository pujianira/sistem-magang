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
                'password' => 'alana_pendaftarpass', 
                'nohp' => '081232175132',
                'alamat' => 'Jalan Aster Nomor 6',
                'nim_nisn' => '199012021643029081',
                'nama_bidang' => 'Informasi dan Komunikasi Publik', 
                'id_bidang' => 'BID3', 
                'kuota_pendaftar' => '20',
                , 'user_id', 'nik', 'ttl', 'jenis_kelamin', 'agama', 'universitas_sekolah', 'jurusan', 'surat_permohonan', 'proposal', 'curriculum_vitae', 'laporan', 'periode', 'id_bidang', 'bidang', 'status_penerimaan', 'status_kelulusan', 'nip_pembina', 'nip_pembimbing'
            ],
            [
                'nama' => 'Ghaaziy Ahmad',
                'email' => 'ghaaziy_pembimbing@gmail.com',
                'password' => 'ghaaziy_pembimbingpass', 
                'nohp' => '082135112735',
                'alamat' => 'Jalan Dahlia Nomor 5',
                'nip' => '199703101243112031',
                'nama_bidang' => 'E-Government', 
                'id_bidang' => 'BID4', 
                'kuota_pendaftar' => '20',
                'nim_nisn', 'user_id', 'nik', 'ttl', 'jenis_kelamin', 'agama', 'universitas_sekolah', 'jurusan', 'surat_permohonan', 'proposal', 'curriculum_vitae', 'laporan', 'periode', 'id_bidang', 'bidang', 'status_penerimaan', 'status_kelulusan', 'nip_pembina', 'nip_pembimbing'
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
                    'nip' => $data['nip'],
                    'user_id' => $userPendaftar->id, 
                    'nama_bidang' => $data['nama_bidang'],
                    'id_bidang' => $data['id_bidang'],
                    'kuota_pendaftar' => $data['kuota_pendaftar'],
                    ['nim_nisn', 'user_id', 'nik', 'ttl', 'jenis_kelamin', 'agama', 'universitas_sekolah', 'jurusan', 'surat_permohonan', 'proposal', 'curriculum_vitae', 'laporan', 'periode', 'id_bidang', 'bidang', 'status_penerimaan', 'status_kelulusan', 'nip_pembina', 'nip_pembimbing']
                ]);
            }
        }
    }
}

