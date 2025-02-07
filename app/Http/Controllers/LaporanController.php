<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Pendaftar;
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

    public function cetakSuratKelulusan()
    {
        $user = Auth::user();

        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        $data = [
            'nama' => $user->nama, 
            'nim' => $pendaftar->nim_nisn,
            'bidang' => $pendaftar->nama_bidang,
            'tanggal' => now()->locale('id')->isoFormat('D MMMM Y')
        ];

        $pdf = PDF::loadView('pendaftar.suratkelulusan-pendaftar', $data);

        return $pdf->download('Surat_Kelulusan_Magang.pdf');
    }
}
