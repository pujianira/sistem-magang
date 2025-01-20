<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Pendaftar;
use App\Models\Periode;

class PendaftaranController extends Controller
{
    public function pendaftar()
    {
        $user = auth()->user(); 
        $bidangs = Bidang::all();
        $pendaftarData = Pendaftar::select('nim_nisn', 'nama', 'universitas_sekolah', 'jurusan', 'nama_bidang', 'status_pendaftaran', 'status_kelulusan')->get();
        $totalPendaftar = Pendaftar::count();

        return view('pembina.pendaftarmagang', compact('user', 'bidangs', 'pendaftarData', 'totalPendaftar'));
    }

    public function daftarMagang() 
    {
        $user = auth()->user(); 
        $bidangs = Bidang::all();
        $periodes = Periode::all();
        return view('pendaftar.daftarmagang', compact('user', 'bidangs', 'periodes'));
    }

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
        $pendaftar = Pendaftar::where('nim_nisn', $nim_nisn)->first();
        $user = $pendaftar->users;
        $pembina = $pendaftar->pembina;

        return view('pembina.infopendaftar', compact('pendaftar', 'user', 'pembina'));
    }

    public function setujuiPendaftaran($nim_nisn)
    {
        $pendaftar = Pendaftar::where('nim_nisn', $nim_nisn)->first();
        
        if ($pendaftar && $pendaftar->status_pendaftaran == 'Pending') {
            $pendaftar->update([
                'status_pendaftaran' => 'Disetujui',
                // 'tanggal_verifikasi' => now()
            ]);
            
            return redirect()->back()->with('success', 'Pendaftaran berhasil disetujui');
        }
        
        return redirect()->back()->with('error', 'Pendaftar tidak ditemukan atau sudah diproses');
    }

    public function tolakPendaftaran($nim_nisn)
    {
        $pendaftar = Pendaftar::where('nim_nisn', $nim_nisn)->first();
        
        if ($pendaftar && $pendaftar->status_pendaftaran == 'Pending') {
            $pendaftar->update([
                'status_pendaftaran' => 'Ditolak',
                // 'tanggal_verifikasi' => now()
            ]);
            
            return redirect()->back()->with('success', 'Pendaftaran telah ditolak');
        }
        
        return redirect()->back()->with('error', 'Pendaftar tidak ditemukan atau sudah diproses');
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
