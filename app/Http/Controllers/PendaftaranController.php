<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{

    public function pendaftar()
    {
        $user = auth()->user(); 
        return view('pembina.pendaftarmagang', compact('user'));
    }
}
