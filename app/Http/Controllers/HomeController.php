<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftar;
use App\Models\Pembimbing;
use Carbon\Carbon;

class HomeController extends Controller
{
    // public function berandaPembina()
    // {
    //     $user = auth()->user(); 

    //     // Statistik Pendaftar Berdasarkan Status
    //     $pendaftar = Pendaftar::all();
    //     $totalPendaftar = $pendaftar->where('status_pendaftaran', '!=', 'Belum Mendaftar')->count();
    //     $menunggu = $pendaftar->where('status_pendaftaran', 'Menunggu')->count();
    //     $diterima = $pendaftar->where('status_pendaftaran', 'Diterima')->count();
    //     $ditolak = $pendaftar->where('status_pendaftaran', 'Ditolak')->count();

    //     $persenMenunggu = $totalPendaftar ? ($menunggu / $totalPendaftar) * 100 : 0;
    //     $persenDiterima = $totalPendaftar ? ($diterima / $totalPendaftar) * 100 : 0;
    //     $persenDitolak = $totalPendaftar ? ($ditolak / $totalPendaftar) * 100 : 0;

    //     // Statistik Pendaftar Berdasarkan Bidang
    //     $bidangTIK = $pendaftar->where('nama_bidang', 'Teknologi Informasi dan Komunikasi')->count();
    //     $bidangStatistik = $pendaftar->where('nama_bidang', 'Statistik')->count();
    //     $bidangIKP = $pendaftar->where('nama_bidang', 'Informasi dan Komunikasi Publik')->count();
    //     $bidangEGov = $pendaftar->where('nama_bidang', 'E-Government')->count();
    //     $bidangPersandian = $pendaftar->where('nama_bidang', 'Persandian dan Keamanan Informasi')->count();
    //     $bidangSekretariat = $pendaftar->where('nama_bidang', 'Sekretariat')->count();

    //     // Hitung total dan masing-masing bidang
    //     $totalBidang = Pendaftar::count();
    //     $bidangCounts = Pendaftar::select('nama_bidang', DB::raw('COUNT(*) as jumlah'))
    //         ->groupBy('nama_bidang')
    //         ->pluck('jumlah', 'nama_bidang')
    //         ->toArray();

    //     // Hitung persentase
    //     $bidangPersentase = [];
    //     foreach ($bidangCounts as $bidang => $jumlah) {
    //         $bidangPersentase[$bidang] = $totalBidang ? ($jumlah / $totalBidang) * 100 : 0;
    //     }

    //     return view('pembina.beranda-pembina', compact(
    //         'user', 'totalPendaftar', 'menunggu', 'diterima', 'ditolak',
    //         'bidangTIK', 'bidangStatistik', 'bidangIKP', 'bidangEGov', 'bidangPersandian', 'bidangSekretariat',
    //         'persenMenunggu', 'persenDiterima', 'persenDitolak', 'totalBidang', 'bidangCounts', 'bidangPersentase'
    //     ));
    // }

    public function berandaPembina()
    {
        $user = Auth::user();
        $namaPembina = $user->nama;

        // Statistik Pendaftar Berdasarkan Status
        $pendaftar = Pendaftar::all();
        $totalPendaftar = $pendaftar->where('status_pendaftaran', '!=', 'Belum Mendaftar')->count();
        $menunggu = $pendaftar->where('status_pendaftaran', 'Menunggu')->count();
        $diterima = $pendaftar->where('status_pendaftaran', 'Diterima')->count();
        $ditolak = $pendaftar->where('status_pendaftaran', 'Ditolak')->count();

        $persenMenunggu = $totalPendaftar ? ($menunggu / $totalPendaftar) * 100 : 0;
        $persenDiterima = $totalPendaftar ? ($diterima / $totalPendaftar) * 100 : 0;
        $persenDitolak = $totalPendaftar ? ($ditolak / $totalPendaftar) * 100 : 0;

        // Statistik Pendaftar Berdasarkan Bidang
        $pendaftarFiltered = $pendaftar->where('status_pendaftaran', '!=', 'Belum Mendaftar'); // Filter bidang
        $bidangCounts = $pendaftarFiltered->groupBy('nama_bidang')->map->count();

        $totalBidang = $pendaftarFiltered->count(); // Total bidang setelah filter
        $bidangPersentase = [];
        foreach ($bidangCounts as $bidang => $jumlah) {
            $bidangPersentase[$bidang] = $totalBidang ? ($jumlah / $totalBidang) * 100 : 0;
        }

        return view('pembina.beranda-pembina', compact(
            'user', 'totalPendaftar', 'menunggu', 'diterima', 'ditolak',
            'persenMenunggu', 'persenDiterima', 'persenDitolak',
            'totalBidang', 'bidangCounts', 'bidangPersentase'
        )); 
    }

    public function berandaPembimbing()
    {
        $user = Auth::user();
        $namaPembimbing = $user->nama;
        $pendaftar = Pendaftar::all();
        $bidangpembimbing = $user->pembimbing->id_bidang;

        $pesertaData = Pendaftar::with('user:id,nama,no_hp')
            ->where('status_pendaftaran', 'diterima')
            ->where('id_bidang', $bidangpembimbing) 
            ->get();

        $totalPeserta = $pesertaData->count();
        // $totalPendaftar = $pendaftar->where('status_pendaftaran', '!=', 'Belum Mendaftar')->count();
        $diperiksa = $pesertaData->where('status_pendaftaran', 'Prose Pemeriksaan')->count();
        $lulus = $pendaftar->where('status_pendaftaran', 'Lulus')->count();
        $tidaklulus = $pendaftar->where('status_pendaftaran', 'Tidak Lulus')->count();

        return view('pembimbing.beranda-pembimbing', compact('user', 'namaPembimbing', 'totalPeserta', 'diperiksa', 'lulus', 'tidaklulus')); 
    }

    public function berandaPendaftar()
    {
        $user = Auth::user();
        $namaPendaftar = $user->nama;
        $statusPendaftaran = $user->pendaftar->status_pendaftaran;
        $statusKelulusan = $user->pendaftar->status_kelulusan;
        $pendaftar = $user->pendaftar;

        $pembimbing = Pembimbing::where('id_bidang', $user->pembimbing->id_bidang ?? null)
            ->with('user') 
            ->first();

        //     $id_bidang = DB::table('pendaftar')
        //     ->where('user_id', $user->id) // Cocokkan user_id dengan id user yang login
        //     ->value('id_bidang'); 
        
        // // Cari pembimbing yang memiliki id_bidang yang sama
        // $pembimbing = DB::table('pembimbing')
        //     ->join('users', 'pembimbing.email', '=', 'users.email') // Join ke tabel users untuk ambil nama
        //     ->where('pembimbing.id_bidang', $id_bidang)
        //     ->select('users.nama') // Ambil nama pembimbing dari tabel users
        //     ->first();

        // $nama_pembimbing = $pembimbing->nama ?? 'Tidak ditemukan';

        // $pembina = Pembina::where('id_bidang', $user->pembimbing->id_bidang ?? null)
        // ->with('user') 
        // ->first();

        $bidang = [
            ['nama' => 'Sekretariat', 'icon' => 'fas fa-university', 'deskripsi' => json_encode(['Sub Bagian Umum dan Kepegawaian', 'Sub Bagian Keuangan dan Barang Milik Daerah'])],
            ['nama' => 'Bidang Pengembangan Komunikasi Publik', 'icon' => 'fas fa-lock', 'deskripsi' => json_encode(['Penyusunan Strategi dan Pengawasan Komunikasi Publik', 'Pengembangan SDM Komunitas TIK'])],
            ['nama' => 'Bidang Sistem Pemerintahan Berbasis Elektronik', 'icon' => 'fas fa-rss', 'deskripsi' => json_encode(['Keamanan Informasi dan Persandian', 'Pengembangan Aplikasi', 'Tata Kelola Teknologi Informasi'])],
            ['nama' => 'Bidang Statistik', 'icon' => 'fas fa-chart-area', 'deskripsi' => json_encode(['Statistik Infrastuktur, Tata Ruang, dan Lingkungan', 'Pengelolaan Statistik Sektoral dan Geospatial'])],
            ['nama' => 'Bidang Pengelolaan Informasi dan Saluran Komunikasi Publik', 'icon' => 'fas fa-bullhorn', 'deskripsi' => json_encode(['Pengelolaan Media', 'Pengelolaan Aspirasi dan Informasi', 'PPID, Keterbukaan Informasi Publik'])],
            ['nama' => 'Sekretariat', 'icon' => 'fas fa-users', 'deskripsi' => json_encode(['Sub Bagian Umum dan Kepegawaian', 'Sub Bagian Keuangan dan Barang Milik Daerah'])],
        ];

        return view('pendaftar.beranda-pendaftar', ['bidang' => $bidang] + compact('user', 'namaPendaftar', 'statusPendaftaran', 'statusKelulusan', 'pendaftar', 'pembimbing'));
    }
}
