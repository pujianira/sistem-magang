@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
    <div class="container mx-auto flex items-center justify-between py-30">
        <div class="w-1/2 flex justify-center">
            <img src="{{ asset('img/logodiskominfo.png') }}" alt="Logo Diskominfo" style="width: 400px; height: auto;" class="h-48">
        </div>
        
        <div class="w-1/2 bg-dark-blue text-white p-40 shadow-lg" style="margin-left: -5px; width: 60%">
            <h1 class="text-3xl font-bold text-center mb-8">Daftar</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium">Nama Lengkap</label>
                    <input id="nama" class="block w-full border rounded-md px-4 py-2 mt-1 text-gray-900" type="text" name="nama" value="{{ old('nama') }}" required autofocus autocomplete="name">
                    @error('nama')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <label for="email" class="block text-sm font-medium">Email</label>
                    <input id="email" class="block w-full border rounded-md px-4 py-2 mt-1 text-gray-900" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- NIM/NISN -->
                <div class="mt-4">
                    <label for="nim_nisn" class="block text-sm font-medium">NIM/NISN</label>
                    <input id="nim_nisn" class="block w-full border rounded-md px-4 py-2 mt-1 text-gray-900" type="text" name="nim_nisn" value="{{ old('nim_nisn') }}" required autocomplete="off">
                    @error('nim_nisn')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <input id="password" class="block w-full border rounded-md px-4 py-2 text-gray-900" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="mt-4">
                    <label for="password_confirmation" class="block text-sm font-medium">Konfirmasi Password</label>
                    <input id="password_confirmation" class="block w-full border rounded-md px-4 py-2 text-gray-900" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-8">
                    <button type="submit" class="bg-orange-400 text-white font-bold block w-full py-2 px-4 rounded-lg hover:bg-orange-500">Daftar</button>
                </div>
            </form>

            <div class="mt-4 text-left">
                <p class="text-sm">Sudah mempunyai akun? <a href="{{ route('login') }}" class="text-orange-500 hover:underline">Masuk</a></p>
            </div>
        </div>
    </div>
@endsection