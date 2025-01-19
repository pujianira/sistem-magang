<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//pembina
Route::middleware(['auth', 'Pembina'])->group(function () {
    Route::get('/pembina/beranda', [HomeController::class, 'berandaPembina'])->name('beranda-Pembina'); 
    Route::get('/pembina/pendaftarmagang', [PendaftaranController::class, 'pendaftar'])->name('pendaftarmagang');
    Route::get('/pembina/pesertamagang', [PesertaController::class, 'daftarPeserta'])->name('pesertamagang');
});

Route::get('/pembina/infopendaftar', function () {
    return view('pembina.infopendaftar'); 
});


//pembimbing
Route::middleware(['auth', 'Pembimbing'])->group(function () {
    Route::get('/pembimbing/beranda', [HomeController::class, 'berandaPembimbing'])->name('beranda-Pembimbing'); 
    Route::get('/pembimbing/pesertamagang', [PesertaController::class, 'daftarMentee'])->name('pesertamagang');
});

//pendaftar
Route::middleware(['auth', 'Pendaftar'])->group(function () {
    Route::get('/pendaftar/beranda', [HomeController::class, 'berandaPendaftar'])->name('beranda-Pendaftar'); 
    Route::get('/pendaftar/daftarmagang', [PendaftaranController::class, 'daftarMagang'])->name('daftarmagang'); 
    Route::post('/pendaftar/daftarmagang', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftar/laporanmagang', [LaporanController::class, 'kirimLaporan'])->name('kirimLaporan'); 
});

require __DIR__.'/auth.php';
