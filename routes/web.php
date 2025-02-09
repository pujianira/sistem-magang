<?php

use App\Http\Controllers\DaftarMagangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PesertaPembimbingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [BerandaController::class, 'home'])->name('home');
Route::get('/profil', [BerandaController::class, 'profil'])->name('profil');
Route::get('/info-bidang', [BerandaController::class, 'infobidang'])->name('info-bidang');
Route::get('/kontak', [BerandaController::class, 'kontak'])->name('kontak');

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//pembina
Route::middleware(['auth', 'Pembina'])->group(function () {
    // Route::get('/pembina/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/pembina/beranda', [HomeController::class, 'berandaPembina'])->name('beranda-Pembina'); 
    Route::get('/pembina/pendaftarmagang', [PendaftaranController::class, 'pendaftar'])->name('pendaftarmagang');
    Route::get('/pembina/pesertamagang', [PesertaController::class, 'daftarPeserta'])->name('pesertamagang');
    Route::get('/pembina/infopendaftar/{nim_nisn}', [PendaftaranController::class, 'infoPendaftar'])->name('infopendaftar');
    Route::get('/pembina/filterBidang', [PendaftaranController::class, 'filterBidang'])->name('filter.bidang');
    Route::get('/pembina/filterBidangPeserta', [PesertaController::class, 'filterBidangPeserta'])->name('filter.bidangpeserta');
    Route::post('/pembina/terima-pendaftaran/{nim_nisn}', [PendaftaranController::class, 'terimaPendaftaran'])->name('terima.pendaftaran');
    Route::post('/pembina/tolak-pendaftaran/{nim_nisn}', [PendaftaranController::class, 'tolakPendaftaran'])->name('tolak.pendaftaran');
    Route::get('/pembina/infopeserta/{nim_nisn}', [PesertaController::class, 'infoPeserta'])->name('infopeserta');
    Route::post('/pembina/setujui-kelulusan/{nim_nisn}', [PesertaController::class, 'setujuiKelulusan'])->name('setujui.kelulusan');
    Route::post('/pembina/tolak-kelulusan/{nim_nisn}', [PesertaController::class, 'tolakKelulusan'])->name('tolak.kelulusan');
});

//pembimbing
Route::middleware(['auth', 'Pembimbing'])->group(function () {
    // Route::get('/pembimbing/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/pembimbing/beranda', [HomeController::class, 'berandaPembimbing'])->name('beranda-Pembimbing'); 
    Route::get('/pembimbing/pesertamagang', [PesertaPembimbingController::class, 'daftarPeserta'])->name('pesertamagang-pembimbing');
    Route::get('/pembimbing/infopeserta/{nim_nisn}', [PesertaPembimbingController::class, 'infoPeserta'])->name('infopeserta-pembimbing');
    Route::post('/pembimbing/infopeserta/{nim_nisn}', [PesertaPembimbingController::class, 'storeNilai'])->name('penilaian');
    // Route::get('/pembimbing/penilaian', [PenilaianController::class, 'index'])->name('penilaian');
    // Route::get('/pembina/filterBidangPeserta', [PesertaPembimbingController::class, 'filterBidangPeserta'])->name('filter.bidangpeserta');

    // Route::get('/pembina/pesertamagang', [PesertaController::class, 'daftarPeserta'])->name('pesertamagang');
    // Route::get('/pembina/infopendaftar/{nim_nisn}', [PendaftaranController::class, 'infoPendaftar'])->name('infopendaftar');
    // Route::get('/pembina/filterBidang', [PendaftaranController::class, 'filterBidang'])->name('filter.bidang');
    // Route::get('/pembina/filterBidangPeserta', [PesertaController::class, 'filterBidangPeserta'])->name('filter.bidangpeserta');
    // Route::post('/pembina/terima-pendaftaran/{nim_nisn}', [PendaftaranController::class, 'terimaPendaftaran'])->name('terima.pendaftaran');
    // Route::post('/pembina/tolak-pendaftaran/{nim_nisn}', [PendaftaranController::class, 'tolakPendaftaran'])->name('tolak.pendaftaran');
    // Route::get('/pembina/infopeserta/{nim_nisn}', [PesertaController::class, 'infoPeserta'])->name('infopeserta');
    // Route::post('/pembina/setujui-kelulusan/{nim_nisn}', [PesertaController::class, 'setujuiKelulusan'])->name('setujui.kelulusan');
    // Route::post('/pembina/tolak-kelulusan/{nim_nisn}', [PesertaController::class, 'tolakKelulusan'])->name('tolak.kelulusan');
});

//pendaftar
Route::middleware(['auth', 'Pendaftar'])->group(function () {
    // Route::get('/pendaftar/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/pendaftar/beranda', [HomeController::class, 'berandaPendaftar'])->name('beranda-Pendaftar'); 
    Route::get('/pendaftar/daftarmagang', [DaftarMagangController::class, 'daftarMagang'])->name('daftarmagang'); 
    Route::get('/getPeriodeByBidang', [PendaftaranController::class, 'getPeriodeByBidang'])->name('getPeriodeByBidang');
    Route::post('/pendaftar/daftarmagang', [DaftarMagangController::class, 'store'])->name('pendaftaran.store');
    Route::get('/view-file/{filename}', [DaftarMagangController::class, 'viewFile'])->name('view-file');
    Route::get('/surat-penerimaan', [DaftarMagangController::class, 'cetakSuratPenerimaan'])->name('cetaksuratpenerimaan');
    Route::get('/pendaftar/laporanmagang', [LaporanController::class, 'kirimLaporan'])->name('kirimLaporan'); 
    Route::post('/pendaftar/laporanmagang', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/surat-kelulusan', [LaporanController::class, 'cetakSuratKelulusan'])->name('cetaksuratkelulusan');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
