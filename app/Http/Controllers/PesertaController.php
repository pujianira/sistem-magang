<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function daftarPeserta()
    {
        $user = auth()->user(); 
        return view('pembina.pesertamagang', compact('user'));
    }
}
