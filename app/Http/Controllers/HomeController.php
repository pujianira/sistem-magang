<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function berandaPembina()
    {
        $user = auth()->user(); 
        return view('pembina.beranda-pembina', compact('user')); 
    }

    public function berandaPembimbing()
    {
        $user = auth()->user(); 
        return view('pembimbing.beranda-pembimbing', compact('user')); 
    }

    public function berandaPendaftar()
    {
        return view('pendaftar/beranda-pendaftar');
    }
}
