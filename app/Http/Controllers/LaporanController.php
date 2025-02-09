<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Pendaftar;
use App\Models\Nilai;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function kirimLaporan()
    {
        $user = Auth::user();
        $pendaftar = $user->pendaftar;
        return view('pendaftar.laporanmagang', compact('user', 'pendaftar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'laporan' =>'required|mimes:pdf,doc,docx|max:2048',
            'judul_laporan' => 'required|string',
            'jenis_karya' => 'required|string',
            'deskripsi_karya' => 'required|string',
        ]);

        $tanggalKirimLaporan = Carbon::createFromFormat('d/m/Y', $request->tanggal_kirimlaporan)->format('Y-m-d');

        $pendaftar = Auth::user()->pendaftar;

        $laporanPath = $request->file('laporan')->storeAs(
            'uploads', 
            'laporan_' . Auth::user()->nama . '_' . $pendaftar->nim_nisn 
            . '.' . $request->file('laporan')->extension(), 
            'public'
        );
        
        if ($pendaftar) {
            $pendaftar->update([
                'laporan' => $laporanPath,
                'judul_laporan' => $request->judul_laporan,
                'jenis_karya' => $request->jenis_karya,
                'deskripsi_karya' => $request->deskripsi_karya,
                'tanggal_kirimlaporan' => $tanggalKirimLaporan,
                'status_kelulusan' => 'Proses Pemeriksaan',  
            ]);
            
        } else {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    // public function cetakSuratKelulusan()
    // {
    //     $user = Auth::user();

    //     $pendaftar = Pendaftar::where('user_id', $user->id)->first();

    //     $data = [
    //         'nama' => $user->nama, 
    //         'nim' => $pendaftar->nim_nisn,
    //         'bidang' => $pendaftar->nama_bidang,
    //         'tanggal' => now()->locale('id')->isoFormat('D MMMM Y')
    //     ];

    //     $pdf = PDF::loadView('pendaftar.suratkelulusan-pendaftar', $data);

    //     return $pdf->download('Surat_Kelulusan_Magang.pdf');
    // }

    public function cetakSuratKelulusan()
    {
        $user = Auth::user();
        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        // Ambil atau buat data penilaian berdasarkan NIM/NISN
        $penilaian = Nilai::firstOrNew(['nim_nisn' => $pendaftar->nim_nisn]);

        // Parameter penilaian dan bobotnya
        $parameter_penilaian = [
            'kehadiran' => 'Kehadiran',
            'ketepatanwaktu' => 'Ketepatan Waktu',
            'sikapkerja_prosedurkerja' => 'Sikap Kerja / Prosedur Kerja',
            'kemampuanbekerjadlmtim' => 'Kemampuan Bekerja dalam Tim',
            'kreativitaskerja' => 'Kreativitas Kerja',
            'inisiatifkerja' => 'Inisiatif Kerja',
            'kemampuankomunikasi' => 'Kemampuan Komunikasi',
            'kemampuanteknikal' => 'Kemampuan Teknikal',
            'kepercayaandiri' => 'Kepercayaan Diri',
            'penampilan_kerapihan' => 'Penampilan & Kerapihan'
        ];

        $bobot = [
            'kehadiran' => 5, 
            'ketepatanwaktu' => 5, 
            'sikapkerja_prosedurkerja' => 10, 
            'kemampuanbekerjadlmtim' => 10,
            'kreativitaskerja' => 10, 
            'inisiatifkerja' => 15, 
            'kemampuankomunikasi' => 15, 
            'kemampuanteknikal' => 20,
            'kepercayaandiri' => 5, 
            'penampilan_kerapihan' => 5
        ];

        $total_nilai = collect($bobot)->keys()->sum(function ($key) use ($penilaian) {
            return $penilaian->$key ?? 0; // Ambil nilai dari database atau 0 jika tidak ada
        });

        // Data untuk PDF
        $data = [
            'nama' => $user->nama, 
            'nim' => $pendaftar->nim_nisn,
            'bidang' => $pendaftar->nama_bidang,
            'tanggal' => now()->locale('id')->isoFormat('D MMMM Y'),
            'universitas_sekolah' => $pendaftar->universitas_sekolah,
            'parameter_penilaian' => $parameter_penilaian,
            'bobot' => $bobot,
            'penilaian' => $penilaian,
            'total_nilai' => $total_nilai
        ];

        $pdf = PDF::loadView('pendaftar.suratkelulusan-pendaftar', $data);

        return $pdf->download('Surat_Kelulusan_Magang.pdf');
    }

}
