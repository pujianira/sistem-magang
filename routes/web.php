<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//pendaftar
Route::get('/pendaftar/dashboard', function () {
    return view('pendaftar/dashboard');
});
//pembina
Route::get('/pembina/dashboard', function () {
    return view('pembina/dashboard');
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
Route::get('/pembimbing/dashboard', function () {
    return view('pembimbing/dashboard');
});
Route::get('/pembimbing/pesertamagang', function () {
    return view('pembimbing/pesertamagang');
});

require __DIR__.'/auth.php';
