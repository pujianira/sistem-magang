<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Pendaftar;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nim_nisn' => ['required', 'string', 'max:14', 'unique:pendaftar,nim_nisn']
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => 'Pendaftar',
        ]);

        Pendaftar::create([
            'nim_nisn' => $request->nim_nisn,
            'user_id' => $user->id,
            'status_pendaftaran' => 'Belum Mendaftar',
            'status_kelulusan' => 'Belum Mendaftar',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('beranda-Pendaftar', absolute: false));
    }
}
