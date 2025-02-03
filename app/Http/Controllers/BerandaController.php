<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function profil()
    {
        return view('profil');
    }

    public function infobidang()
    {
        return view('info-bidang');
    }

    public function kontak()
    {
        return view('kontak');
    }
}
