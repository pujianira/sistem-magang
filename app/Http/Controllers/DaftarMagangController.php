<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Bidang;
use App\Models\Pendaftar;
use App\Models\Periode;
use Carbon\Carbon;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class DaftarMagangController extends Controller
{
    public function daftarMagang() 
    {
        $user = Auth::user();
        $namaPembina = $user->nama;
        $bidang = Bidang::all();
        $periode = Periode::all();
        $pendaftar = $user->pendaftar;
        return view('pendaftar.daftarmagang', compact('user', 'bidang', 'periode', 'pendaftar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|numeric',
            'univ_sekolah' => 'required|string',
            'nim_nisn' => 'required|numeric',
            'nik' => 'required|numeric',
            'jurusan' => 'required|string',
            'periode_mulai' => 'required|string',
            'durasi' => 'required|numeric|min:1|max:12',
            // 'bidang' => 'required|string',
            'bidang' => 'required|exists:bidang,id_bidang',
            'surat_permohonan' => 'required|mimes:pdf,doc,docx|max:2048',
            'proposal' => 'required|mimes:pdf,doc,docx|max:2048',
            // 'curriculum_vitae' => 'required|mimes:pdf,doc,docx|max:2048',
            'cv' => 'required|mimes:pdf,doc,docx|max:2048',
            // 'tanggal_pendaftaran' => 'required|date_format:d/m/Y',
        ]);

        // $fotoPath = $request->file('foto')->storeAs(
        //     'uploads/' . Auth::id(), 
        //     'foto_' . time() . '.' . $request->file('foto')->extension()
        // );
        $periode = explode('-', $request->periode_mulai);
        $bulan_mulai = $periode[0];
        $tahun_mulai = $periode[1];

        $bidang = Bidang::where('id_bidang', $request->bidang)->first();
        $namaBidang = $bidang ? $bidang->nama : '';

        $tanggalPendaftaran = Carbon::createFromFormat('d/m/Y', $request->tanggal_daftar)->format('Y-m-d');

        $pendaftar = Auth::user()->pendaftar;

        $fotoPath = $request->file('foto')->storeAs(
            'uploads', 
            'foto_' . Auth::user()->nama . '_' . $pendaftar->nim_nisn 
            . '.' . $request->file('foto')->extension(), 
            'public'
        );
        $suratPath = $request->file('surat_permohonan')->storeAs(
            'uploads', 
            'surat_permohonan_' . Auth::user()->nama . '_' . $pendaftar->nim_nisn 
            . '.' . $request->file('surat_permohonan')->extension(), 
            'public'
        );
        $proposalPath = $request->file('proposal')->storeAs(
            'uploads', 
            'proposal_' . Auth::user()->nama . '_' . $pendaftar->nim_nisn 
            . '.' . $request->file('proposal')->extension(), 
            'public'
        );
        $cvPath = $request->file('cv')->storeAs(
            'uploads', 
            'cv_' . Auth::user()->nama . '_' . $pendaftar->nim_nisn 
            . '.' . $request->file('cv')->extension(), 
            'public'
        );
        
        if ($pendaftar) {
            $pendaftar->update([
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'univ_sekolah' => $request->univ_sekolah,
                'nim_nisn' => $request->nim_nisn,
                'nik' => $request->nik,
                'jurusan' => $request->jurusan,
                'bulan_mulai' => $bulan_mulai,
                'tahun_mulai' => $tahun_mulai,
                'durasi' => $request->durasi,
                'id_bidang' => $request->bidang,
                'nama_bidang' => $namaBidang,
                'surat_permohonan' => $suratPath,
                'proposal' => $proposalPath,
                'curriculum_vitae' => $cvPath,
                // 'cv' => $cvPath,
                'status_pendaftaran' => 'Menunggu', 
                'status_kelulusan' => 'Menunggu', 
                'tanggal_pendaftaran' => $tanggalPendaftaran, 
            ]);
            
        } else {
            return redirect()->back()->with('error', 'Pendaftar tidak ditemukan.');
        }

        $user = User::find(Auth::id());
        $user->foto = $fotoPath;
        $user->save();

        // $user = Auth::user();
        // $user->foto = $fotoPath;
        // $user->save();
        // Auth::user()->update([
        //     'foto' => $fotoPath,
        // ]);
        // $userPendaftar = User::create([
        //     'nama' => $data['nama'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'no_hp' => $data['nohp'] ?? null,
        //     'alamat' => $data['alamat'] ?? null,
        //     'foto' => $data['foto'] ?? null,
        //     'peran' => 'Pendaftar',
        // ]);
//         $user = Auth::user();
// $user->foto = $fotoPath;
// $user->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function cetakSuratPenerimaan()
    {
        $user = Auth::user();

        $pendaftar = Pendaftar::where('user_id', $user->id)->first();

        $data = [
            'nama' => $user->nama, 
            'nim' => $pendaftar->nim_nisn,
            'bidang' => $pendaftar->nama_bidang,
            'tanggal' => now()->locale('id')->isoFormat('D MMMM Y'),
            'universitas_sekolah' => $pendaftar->universitas_sekolah,
            'bulan_mulai' => $pendaftar->bulan_mulai,
            'tahun_mulai' => $pendaftar->tahun_mulai
        ];

        $pdf = PDF::loadView('pendaftar.suratpenerimaan-pendaftar', $data);

        return $pdf->download('Surat_Penerimaan_Magang.pdf');
    }

    public function viewFile($filename)
    {
        $path = storage_path('app/public/uploads/' . $filename);
        
        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public function getPeriodeByBidang(Request $request)
    {
        $id_bidang = $request->id_bidang;

        $periode = DB::table('kuota')
            ->join('periode', 'kuota.id_periode', '=', 'periode.id_periode')
            ->where('kuota.id_bidang', $id_bidang)
            ->select('periode.id_periode', 'periode.bulan', 'periode.tahun', DB::raw('(kuota.kuota_pendaftar - COALESCE((SELECT COUNT(*) FROM pendaftar WHERE pendaftar.id_periode = periode.id_periode AND pendaftar.id_bidang = kuota.id_bidang), 0)) as sisa_kuota'))
            ->get();

        return response()->json($periode);
    }

}
