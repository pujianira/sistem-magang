<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Periode;
use App\Models\Bidang;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class PesertaPembimbingController extends Controller
{
    public function daftarPeserta(Request $request)
    {
        $user = Auth::user();
        // $bidang = Bidang::all();
        $bidangpembimbing = $user->pembimbing->id_bidang;
        
        $pesertaData = Pendaftar::with('user:id,nama,no_hp')
            ->where('status_pendaftaran', 'diterima')
            ->where('id_bidang', $bidangpembimbing) 
            ->orderBy('status_kelulusan', $request->input('direction', 'asc'))
            ->get();

        $totalPeserta = $pesertaData->count();

        return view('pembimbing.pesertamagang', compact('user', 'pesertaData', 'totalPeserta', 'bidangpembimbing'));
    }

    // public function filterBidangPeserta(Request $request)
    // {
    //     $bidangs = Bidang::all(); 
    //     $user = auth()->user(); 
        
    //     $bidang = $request->input('bidang');
        
    //     $pesertaData = Pendaftar::with('user:id,no_hp')
    //         ->where('status_pendaftaran', 'Diterima');
        
    //     if ($bidang) {
    //         $pesertaData = $pesertaData->where('id_bidang', $bidang);
    //     }
        
    //     $pesertaData = $pesertaData->get();
    //     $totalPeserta = $pesertaData->count();
        
    //     return view('pembina.pesertamagang', compact('pesertaData', 'bidangs', 'user', 'totalPeserta'));
    // }

    public function infoPeserta($nim_nisn)
    {
        $user = Auth::user();
        $bidangpembimbing = $user->pembimbing->id_bidang;

        $peserta = Pendaftar::where('nim_nisn', $nim_nisn)
            ->where('status_pendaftaran', 'diterima')
            ->where('id_bidang', $bidangpembimbing) 
            ->first();
        // $user = $peserta->users;
        // $pembina = $peserta->pembina;
        // $nilai = $peserta->nilai;
        // $pendaftar = Pendaftar::where('nim_nisn', $nim_nisn)->first();

        $nilai = Nilai::where('nim_nisn', $nim_nisn)->first();

        // $penilaian = Nilai::updateOrCreate(['nim_nisn' => $nim_nisn], [
        //     'kehadiran' => null, 
        //     'ketepatanwaktu' => null, 
        //     'sikapkerja_prosedurkerja' => null, 
        //     'kemampuanbekerjadlmtim' => null,
        //     'kreativitaskerja' => null, 
        //     'inisiatifkerja' => null, 
        //     'kemampuankomunikasi' => null, 
        //     'kemampuanteknikal' => null,
        //     'kepercayaandiri' => null, 
        //     'penampilan_kerapihan' => null
        // ]);    
        $penilaian = Nilai::firstOrNew(['nim_nisn' => $nim_nisn]);    

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

        // $penilaian->save();

        return view('pembimbing.infopeserta', compact('peserta', 'user', 'nilai', 'penilaian', 'parameter_penilaian', 'bobot'));
    }

    public function storeNilai(Request $request, $nim_nisn)
    {
        $validatedData = $request->validate([
            'nim_nisn' => 'required|exists:pendaftar,nim_nisn',
            'kehadiran' => 'required|numeric|min:0|max:5',
            'ketepatanwaktu' => 'required|numeric|min:0|max:5',
            'sikapkerja_prosedurkerja' => 'required|numeric|min:0|max:10',
            'kemampuanbekerjadlmtim' => 'required|numeric|min:0|max:10',
            'kreativitaskerja' => 'required|numeric|min:0|max:10',
            'inisiatifkerja' => 'required|numeric|min:0|max:15',
            'kemampuankomunikasi' => 'required|numeric|min:0|max:15',
            'kemampuanteknikal' => 'required|numeric|min:0|max:20',
            'kepercayaandiri' => 'required|numeric|min:0|max:5',
            'penampilan_kerapihan' => 'required|numeric|min:0|max:5',
        ]);
    
        $nim_nisn = $validatedData['nim_nisn'];
    
        $penilaian = Nilai::updateOrCreate(
            ['nim_nisn' => $nim_nisn], 
            $validatedData 
        );    

        // return redirect()->back()->with('success', 'Penilaian berhasil disimpan!');
        return redirect()->route('infopeserta-pembimbing', $nim_nisn)
        ->with('success', 'Penilaian berhasil disimpan!');
    }


    // public function infoPeserta($nim_nisn)
    // {
    //     $peserta = Pendaftar::where('nim_nisn', $nim_nisn)
    //         ->where('status_pendaftaran', 'diterima')
    //         ->with(['user', 'pembina', 'nilai'])  // Eager load relationships
    //         ->firstOrFail();
            
    //     return view('pembina.infopeserta', [
    //         'peserta' => $peserta,
    //         'user' => $peserta->user,
    //         'pembina' => $peserta->pembina,
    //         'nilai' => $peserta->nilai
    //     ]);
    // }

    // public function setujuiKelulusan($nim_nisn)
    // {
    //     try {
    //         $peserta = Pendaftar::where('nim_nisn', $nim_nisn)->firstOrFail();
            
    //         // Cek apakah status peserta aktif
    //         if ($peserta->status_kelulusan !== 'Aktif') {
    //             return redirect()->back()->with('error', 'Hanya peserta dengan status Aktif yang dapat diubah status kelulusannya');
    //         }

    //         // Update status kelulusan menjadi Lulus
    //         $peserta->update([
    //             'status_kelulusan' => 'Lulus'
    //         ]);

    //         return redirect()->back()->with('success', 'Status kelulusan peserta berhasil diubah menjadi Lulus');

    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses kelulusan');
    //     }
    // }

    // public function tolakKelulusan($nim_nisn)
    // {
    //     try {
    //         $peserta = Pendaftar::where('nim_nisn', $nim_nisn)->firstOrFail();
            
    //         // Cek apakah status peserta aktif
    //         if ($peserta->status_kelulusan !== 'Aktif') {
    //             return redirect()->back()->with('error', 'Hanya peserta dengan status Aktif yang dapat diubah status kelulusannya');
    //         }

    //         // Update status kelulusan menjadi Tidak Lulus
    //         $peserta->update([
    //             'status_kelulusan' => 'Tidak Lulus'
    //         ]);

    //         return redirect()->back()->with('success', 'Status kelulusan peserta berhasil diubah menjadi Tidak Lulus');

    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses kelulusan');
    //     }
    // }
}
