<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule; 

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function show()
    {
        $user = auth()->user(); // Ambil data user yang sedang login
        return view('profile.show', compact('user'));
    }
    
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    public function update(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'no_hp' => ['nullable', 'string', 'max:15'],
            'alamat' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('profile-photos', 'public');
            $user->foto = $path;
        }

        $user->fill($request->only('nama', 'email', 'no_hp', 'alamat'));
        
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
        
        $user->save();

        if ($user->peran === 'Pendaftar') {
            $user->pendaftar->update($request->only([
                'nik',
                'jenis_kelamin',
                'agama',
                'tempat_lahir',
                'tanggal_lahir',
                'universitas_sekolah',
                'jurusan',
            ]));
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }
}
