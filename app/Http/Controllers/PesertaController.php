<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Periode;
use App\Models\Bidang;

class PesertaController extends Controller
{
    public function daftarPeserta(Request $request)
    {
        $user = auth()->user();
        $bidangs = Bidang::all();
        
        $pesertaData = Pendaftar::with('user:id,nama,no_hp')
            ->where('status_pendaftaran', 'diterima')
            ->orderBy('status_kelulusan', $request->input('direction', 'asc'))
            ->paginate(10);

        $totalPeserta = $pesertaData->count();

        return view('pembina.pesertamagang', compact('user', 'pesertaData', 'totalPeserta', 'bidangs'));
    }

    public function filterBidangPeserta(Request $request)
    {
        $bidangs = Bidang::all(); 
        $user = auth()->user(); 
        
        $bidang = $request->input('bidang');
        
        $pesertaData = Pendaftar::with('user:id,no_hp')
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

        return view('pembina.infopeserta', compact('peserta', 'user', 'pembina'));
    }

    public function setujuiKelulusan($nim_nisn)
    {
        try {
            $peserta = Pendaftar::where('nim_nisn', $nim_nisn)->firstOrFail();
            
            // Cek apakah status peserta aktif
            if ($peserta->status_kelulusan !== 'Aktif') {
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
            if ($peserta->status_kelulusan !== 'Aktif') {
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
