<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Pendaftar;
use App\Models\Periode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    public function pendaftar(Request $request)
{
    $user = auth()->user(); 
    $bidangs = Bidang::all();
    
    $pendaftarData = Pendaftar::with('user:id,nama') 
        ->select('nim_nisn', 'universitas_sekolah', 'jurusan', 'nama_bidang', 'status_pendaftaran', 'status_kelulusan', 'user_id')
        ->whereHas('user')  
        ->where('status_pendaftaran', '!=', 'Belum Mendaftar') 
        ->orderBy('status_pendaftaran', $request->input('direction', 'asc'))
        ->get();
    
    $totalPendaftar = $pendaftarData->count();

    return view('pembina.pendaftarmagang', compact('user', 'bidangs', 'pendaftarData', 'totalPendaftar'));
}

    // public function daftarMagang() 
    // {
    //     $user = auth()->user(); 
    //     $bidangs = Bidang::all();
    //     $periodes = Periode::all();
    //     return view('pendaftar.daftarmagang', compact('user', 'bidangs', 'periodes'));
    // }

    public function filterBidang(Request $request)
    {
        $bidangs = Bidang::all(); 
        $user = auth()->user(); 
        
        $bidang = $request->input('bidang');
        
        $pendaftarData = Pendaftar::query();
        
        if ($bidang) {
            $pendaftarData = $pendaftarData->where('id_bidang', $bidang);
        }
        
        $pendaftarData = $pendaftarData->get();
        $totalPendaftar = $pendaftarData->count();
        
        return view('pembina.pendaftarmagang', compact('pendaftarData', 'bidangs', 'user', 'totalPendaftar'));
    }

        public function infoPendaftar($nim_nisn)
    {
        $user = Auth::user();
        $pendaftar = Pendaftar::where('nim_nisn', $nim_nisn)->first();
        $user = $pendaftar->users;
        $pembina = $pendaftar->pembina;

        return view('pembina.infopendaftar', compact('pendaftar', 'user', 'pembina'));
    }

    public function terimaPendaftaran($nim_nisn)
    {
        $pendaftar = Pendaftar::where('nim_nisn', $nim_nisn)->first();
        
        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan');
        }

        try {
            $pendaftar->status_pendaftaran = 'Diterima';
            $pendaftar->status_kelulusan = 'Aktif';
            $pendaftar->save();
            
            return redirect()->back()->with('success', 'Pendaftaran berhasil diterima');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pendaftaran');
        }
    }

    public function tolakPendaftaran($nim_nisn) 
    {
        $pendaftar = Pendaftar::where('nim_nisn', $nim_nisn)->first();
        
        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan');
        }

        try {
            $pendaftar->status_pendaftaran = 'Ditolak';
            $pendaftar->save();
            
            return redirect()->back()->with('success', 'Pendaftaran telah ditolak');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses pendaftaran');
        }
    }

    public function resetStatus($nim_nisn)
    {
        $pendaftar = Pendaftar::where('nim_nisn', $nim_nisn)->first();
        
        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan');
        }

        try {
            $pendaftar->status_pendaftaran = 'Pending';
            $pendaftar->save();
            
            return redirect()->back()->with('success', 'Status berhasil direset');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mereset status');
        }
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'proposal' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'surat' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Simpan file yang diunggah
        $fotoPath = $request->file('foto')->store('uploads/foto');
        $cvPath = $request->file('cv')->store('uploads/cv');
        $proposalPath = $request->file('proposal')->store('uploads/proposal');
        $suratPath = $request->file('surat')->store('uploads/surat');

        // Simpan data ke database
        Pendaftar::create([
            'nama' => $validated['nama'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'agama' => $validated['agama'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'],
            'no_hp' => $validated['no_hp'],
            'foto' => $fotoPath,
            'cv' => $cvPath,
            'proposal' => $proposalPath,
            'surat' => $suratPath,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pendaftaran berhasil diajukan.');
    }
}
