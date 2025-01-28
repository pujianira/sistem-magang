<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function berandaPembina()
    {
        $user = Auth::user();
        $namaPembina = $user->nama;
        return view('pembina.beranda-pembina', compact('user', 'namaPembina')); 
    }

    public function berandaPembimbing()
    {
        $user = Auth::user();
        $namaPembimbing = $user->nama;
        return view('pembimbing.beranda-pembimbing', compact('user', 'namaPembimbing')); 
    }

    public function berandaPendaftar()
    {
        $user = Auth::user();
        $namaPendaftar = $user->nama;
        $statusPendaftaran = $user->pendaftar->status_pendaftaran;
        $statusKelulusan = $user->pendaftar->status_kelulusan;
        return view('pendaftar.beranda-pendaftar', compact('user', 'namaPendaftar', 'statusPendaftaran', 'statusKelulusan'));
    }
}
