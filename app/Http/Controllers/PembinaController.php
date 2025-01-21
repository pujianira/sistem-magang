<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembinaController extends Controller
{
    // Di PembinaController.php atau controller yang relevan
public function __construct()
{
    $this->middleware('auth');
}

public function getProfilPembina()
{
    // Mengambil data user yang sedang login
    $user = Auth::user();
    
    // Mengambil data pembina yang terkait dengan user
    $pembina = Pembina::where('user_id', $user->id)->first();
    
    // Menyiapkan data untuk view
    $data = [
        'user' => $user,
        'pembina' => $pembina
    ];
    
    // Kirim data ke view
    return view('layouts.sidebarp', $data);
}
}
