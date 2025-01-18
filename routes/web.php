<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
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

Route::middleware(['auth', 'Pembina'])->group(function () {
    Route::get('/DPA/dekan/pembimbingakademik', [HomeController::class, 'transisiDPA'])->name('transisi-DPA'); 
});

Route::middleware(['auth', 'Pembimbing'])->group(function () {
    Route::get('/DPA/dekan/pembimbingakademik', [HomeController::class, 'transisiDPA'])->name('transisi-DPA'); 
});

Route::middleware(['auth', 'Pendaftar'])->group(function () {
    Route::get('/DPA/dekan/pembimbingakademik', [HomeController::class, 'transisiDPA'])->name('transisi-DPA'); 
});

require __DIR__.'/auth.php';
