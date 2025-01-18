<?php

use App\Http\Controllers\ProfileController;
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
});

Route::get('/pembina/infopendaftar', function () {
    return view('pembina.infopendaftar'); 
});

Route::get('/pembina/pendaftarmagang', function () {
    return view('pembina.pendaftarmagang'); 
});
Route::get('/pembina/pesertamagang', function () {
    return view('pembina.pesertamagang'); 
});

//pembimbing
Route::middleware(['auth', 'Pembimbing'])->group(function () {
    Route::get('/pembimbing/beranda', [HomeController::class, 'berandaPembimbing'])->name('beranda-Pembimbing'); 
});

Route::get('/pembimbing/pesertamagang', function () {
    return view('pembimbing/pesertamagang');
});

//pendaftar
Route::middleware(['auth', 'Pendaftar'])->group(function () {
    Route::get('/pendaftar/beranda', [HomeController::class, 'berandaPendaftar'])->name('beranda-Pendaftar'); 
});

require __DIR__.'/auth.php';
