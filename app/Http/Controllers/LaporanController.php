<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function kirimLaporan()
    {
        $user = auth()->user(); 
        return view('pendaftar.laporanmagang', compact('user'));
    }
}
