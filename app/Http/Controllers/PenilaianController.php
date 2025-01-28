<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        return view('pembimbing/penilaian'); // Pastikan Anda memiliki view 'penilaian.blade.php'
    }
}
