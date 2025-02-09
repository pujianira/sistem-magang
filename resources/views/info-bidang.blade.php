@extends('layouts.app')

@section('title', 'Info Bidang')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold text-center mb-6">Info Bidang</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($bidang as $b)
        <div class="bg-white shadow-lg rounded-lg p-8 cursor-pointer hover:bg-gray-100 transition mx-auto w-full max-w-md"
            x-data="{ open: false }">
            <div class="flex flex-col items-center text-center space-y-4" @click="open = true">
                <div class="text-blue-500 text-6xl">
                    <i class="{{ $b['icon'] }}"></i>
                </div>
                <h4 class="text-xl font-semibold">{{ $b['nama'] }}</h4>
            </div>

            <!-- Modal -->
            <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 p-4"
                 x-cloak>
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
                    <button class="absolute top-2 right-2 text-gray-600 text-2xl" @click="open = false">&times;</button>
                    <i class="{{ $b['icon'] }}"></i>
                    <h2 class="text-2xl font-bold mb-4">{{ $b['nama'] }}</h2>
                    @php
                        $deskripsi = json_decode($b['deskripsi']);
                    @endphp
                    <ul>
                        @foreach($deskripsi as $poin)
                            <li>- {{ $poin }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
