<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Periode;
use App\Models\Bidang;
use App\Models\Nilai;

class PesertaController extends Controller
{
    public function daftarPeserta(Request $request)
    {
        $user = auth()->user();
        $bidangs = Bidang::all();
        
        $pesertaData = Pendaftar::with('user:id,nama,no_hp')
            ->where('status_pendaftaran', 'diterima')
            ->orderBy('status_kelulusan', $request->input('direction', 'asc'))
            ->get();

        $totalPeserta = $pesertaData->count();

        return view('pembina.pesertamagang', compact('user', 'pesertaData', 'totalPeserta', 'bidangs'));
    }

    public function filterBidangPeserta(Request $request)
    {
        $bidangs = Bidang::all(); 
        $user = auth()->user(); 
        
        $bidang = $request->input('bidang');
        
        $pesertaData = Pendaftar::with('user:id,no_hp,nama')
            ->where('status_pendaftaran', 'Diterima');
        
        if ($bidang) {
            $pesertaData = $pesertaData->where('id_bidang', $bidang);
        }
        
        $pesertaData = $pesertaData->get();
        $totalPeserta = $pesertaData->count();
        
        return view('pembina.pesertamagang', compact('pesertaData', 'bidangs', 'user', 'totalPeserta'));
    }

    public function infoPeserta($nim_nisn)
    {
        $peserta = Pendaftar::where('nim_nisn', $nim_nisn)
            ->where('status_pendaftaran', 'diterima')
            ->first();
        $user = $peserta->users;
        $pembina = $peserta->pembina;

        // Gunakan firstOrNew agar selalu ada objek nilai
        $nilai = Nilai::firstOrNew(['nim_nisn' => $nim_nisn], [
            'kehadiran' => 0,
            'ketepatanwaktu' => 0,
            'sikapkerja_prosedurkerja' => 0,
            'kemampuanbekerjadlmtim' => 0,
            'kreativitaskerja' => 0,
            'inisiatifkerja' => 0,
            'kemampuankomunikasi' => 0,
            'kemampuanteknikal' => 0,
            'kepercayaandiri' => 0,
            'penampilan_kerapihan' => 0
        ]);

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

        $total_nilai = (float)$nilai->kehadiran + 
                    (float)$nilai->ketepatanwaktu + 
                    (float)$nilai->sikapkerja_prosedurkerja + 
                    (float)$nilai->kemampuanbekerjadlmtim + 
                    (float)$nilai->kreativitaskerja + 
                    (float)$nilai->inisiatifkerja + 
                    (float)$nilai->kemampuankomunikasi + 
                    (float)$nilai->kemampuanteknikal + 
                    (float)$nilai->kepercayaandiri + 
                    (float)$nilai->penampilan_kerapihan;

        return view('pembina.infopeserta', compact('peserta', 'user', 'pembina', 'nilai', 'parameter_penilaian', 'bobot', 'total_nilai'));
    }

    public function setujuiKelulusan($nim_nisn)
    {
        try {
            $peserta = Pendaftar::where('nim_nisn', $nim_nisn)->firstOrFail();
            
            // Cek apakah status peserta aktif
            if ($peserta->status_kelulusan !== 'Proses Pemeriksaan') {
                return redirect()->back()->with('error', 'Hanya peserta dengan status Aktif yang dapat diubah status kelulusannya');
            }

            // Update status kelulusan menjadi Lulus
            $peserta->update([
                'status_kelulusan' => 'Lulus'
            ]);

            return redirect()->back()->with('success', 'Status kelulusan peserta berhasil diubah menjadi Lulus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses kelulusan');
        }
    }

    public function tolakKelulusan($nim_nisn)
    {
        try {
            $peserta = Pendaftar::where('nim_nisn', $nim_nisn)->firstOrFail();
            
            // Cek apakah status peserta aktif
            if ($peserta->status_kelulusan !== 'Proses Pemeriksaan') {
                return redirect()->back()->with('error', 'Hanya peserta dengan status Aktif yang dapat diubah status kelulusannya');
            }

            // Update status kelulusan menjadi Tidak Lulus
            $peserta->update([
                'status_kelulusan' => 'Tidak Lulus'
            ]);

            return redirect()->back()->with('success', 'Status kelulusan peserta berhasil diubah menjadi Tidak Lulus');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses kelulusan');
        }
    }

    public function daftarMentee()
    {
        $user = auth()->user(); 
        return view('pembimbing.pesertamagang', compact('user'));
    }
}
