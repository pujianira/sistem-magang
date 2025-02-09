<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;

class BerandaController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function profil()
    {
        return view('profil');
    }

    public function infobidang()
    {
        $bidang = [
            ['id_bidang' => 'BID1', 'nama' => 'Sekretariat', 'icon' => 'fas fa-university', 'deskripsi' => json_encode(['Sub Bagian Umum dan Kepegawaian', 'Sub Bagian Keuangan dan Barang Milik Daerah'])],
            ['id_bidang' => 'BID2', 'nama' => 'Bidang Pengembangan Komunikasi Publik', 'icon' => 'fas fa-lock', 'deskripsi' => json_encode(['Penyusunan Strategi dan Pengawasan Komunikasi Publik', 'Pengembangan SDM Komunitas TIK'])],
            ['id_bidang' => 'BID3', 'nama' => 'Bidang Sistem Pemerintahan Berbasis Elektronik', 'icon' => 'fas fa-rss', 'deskripsi' => json_encode(['Keamanan Informasi dan Persandian', 'Pengembangan Aplikasi', 'Tata Kelola Teknologi Informasi'])],
            ['id_bidang' => 'BID6', 'nama' => 'Bidang Statistik', 'icon' => 'fas fa-chart-area', 'deskripsi' => json_encode(['Statistik Infrastuktur, Tata Ruang, dan Lingkungan', 'Pengelolaan Statistik Sektoral dan Geospatial'])],
            ['id_bidang' => 'BID4', 'nama' => 'Bidang Pengelolaan Informasi dan Saluran Komunikasi Publik', 'icon' => 'fas fa-bullhorn', 'deskripsi' => json_encode(['Pengelolaan Media', 'Pengelolaan Aspirasi dan Informasi', 'PPID, Keterbukaan Informasi Publik'])],
            ['id_bidang' => 'BID5', 'nama' => 'Bidang Pengelolaan Infrastruktur', 'icon' => 'fas fa-users', 'deskripsi' => json_encode(['Layanan Infrastruktur, Internet, dan Intranet', 'Pengelolaan Saluran Informasi', 'Pengelolaan TIK'])],
        ];
        return view('info-bidang', ['bidang' => $bidang]);
    }

    public function kontak()
    {
        return view('kontak');
    }
}
