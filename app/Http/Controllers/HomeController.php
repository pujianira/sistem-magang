<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function berandaPembina()
    {
        return view('pembina/beranda-pembina');
    }

    public function berandaPembimbing()
    {
        return view('pembimbing/beranda-pembimbing');
    }

    public function berandaPendaftar()
    {
        return view('pendaftar/beranda-pendaftar');
    }
}
