<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pendaftar/dashboard');
});

//pembina
Route::get('/pembina/dashboard', function () {
    return view('pembina/dashboard');
});
Route::get('/pembina/listpendaftar', function () {
    return view('pembina.listpendaftar'); 
});