<?php

use Illuminate\Support\Facades\Route;


//pendaftar
Route::get('/pendaftar/dashboard', function () {
    return view('pendaftar/dashboard');
});

//pembina
Route::get('/pembina/dashboard', function () {
    return view('pembina/dashboard');
});
Route::get('/pembina/pendaftarmagang', function () {
    return view('pembina.pendaftarmagang'); 
});
Route::get('/pembina/infopendaftar', function () {
    return view('pembina.infopendaftar'); 
});

//pembimbing
Route::get('/pembimbing/dashboard', function () {
    return view('pembimbing/dashboard');
});

Route::get('/pembimbing/pesertamagang', function () {
    return view('pembimbing/pesertamagang');
});