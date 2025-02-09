<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembimbing</title>
    <!-- Link ke Google Fonts untuk font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        /* Menggunakan font Inter untuk seluruh halaman */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('layouts.sidebarm') 
        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="relative mb-6">
                <!-- Welcome Banner -->
                <img src="{{ asset('img/orangwelcome.png') }}" alt="Illustration of a person waving" class="absolute -top-12 right-0 w-60 h-40">
                <div class="bg-gradient-to-t from-[#1B7691] to-[#10BCEF] text-white p-10 rounded-md flex items-center mb-6 mt-8">
                    <h2 class="text-2xl font-bold">Selamat datang, {{ $namaPembimbing }}!</h2>
                </div>
            </div>
            <!-- Info Cards -->
            <!-- Kotak-Kotak Informasi -->
            {{-- <div class="grid grid-cols-2 gap-6 mb-2">
                {{-- <div class="bg-white p-6 rounded-md shadow-lg text-center">
                    <h3 class="text-lg font-bold mb-2">Status Pendaftaran</h3>
                    <p class="text-2xl font-bold">{{ $statusPendaftaran }}</p>
                </div>
                <div class="bg-white p-6 rounded-md shadow-lg text-center">
                    <h3 class="text-lg font-bold mb-2">Status Kelulusan</h3>
                    <p class="text-2xl font-bold">{{ $statusKelulusan }}</p>
                </div> 
            </div> --}}
            <div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                        <p class="text-4xl text-blue-600 font-bold mb-2">{{ $totalPeserta }}</p>
                        <p class="text-gray-600 font-medium">Total Peserta</p>
                    </div>
                    <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                        <p class="text-4xl text-yellow-500 font-bold mb-2">{{ $diperiksa }}</p>
                        <p class="text-gray-600 font-medium">Proses Pemeriksaan</p>
                    </div>
                    <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                        <p class="text-4xl text-green-500 font-bold mb-2">{{ $lulus }}</p>
                        <p class="text-gray-600 font-medium">Lulus</p>
                    </div>
                    <div class="bg-white p-5 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                        <p class="text-4xl text-red-500 font-bold mb-2">{{ $tidaklulus }}</p>
                        <p class="text-gray-600 font-medium">Tidak Lulus</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>