<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Pendaftar;

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
        $user = auth()->user(); 

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
        $user = auth()->user(); 
        return view('pembimbing.beranda-pembimbing', compact('user')); 
    }

    public function berandaPendaftar()
    {
        $user = auth()->user(); 
        return view('pendaftar.beranda-pendaftar', compact('user')); 
    }
}
