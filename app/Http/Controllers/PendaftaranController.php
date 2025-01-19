<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidang;
class PendaftaranController extends Controller
{

    public function pendaftar()
    {
        $user = auth()->user(); 
        $bidangs = Bidang::all();
        return view('pembina.pendaftarmagang', compact('user', 'bidangs'));
    }
}
