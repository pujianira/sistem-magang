<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftar</title>
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
        @include('layouts.sidebar-pendaftar')
        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="relative mb-6">
                <!-- Welcome Banner -->
                <img src="{{ asset('img/orangwelcome.png') }}" alt="Illustration of a person waving" class="absolute -top-12 right-0 w-60 h-40">
                <div class="bg-gradient-to-t from-[#1B7691] to-[#10BCEF] text-white p-10 rounded-md flex items-center mb-6 mt-8">
                    <h2 class="text-2xl font-bold">Selamat datang, {{ $user->nama }}!</h2>
                </div>
            </div>
            <!-- Info Cards -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-md shadow-lg text-center">
                    <h3 class="text-lg font-bold mb-2">Status Pendaftaran</h3>
                    <p class="text-2xl font-bold">DITERIMA</p>
                </div>
                <div class="bg-white p-6 rounded-md shadow-lg text-center">
                    <h3 class="text-lg font-bold mb-2">Status Kelulusan</h3>
                    <p class="text-2xl font-bold">-</p>
                </div>
            </div>
            <!-- Details Section -->
            <div class="grid grid-cols-2 gap-6">
                <div class="bg-gray-100 p-6 rounded-md">
                    <h3 class="text-lg font-bold mb-4">Durasi Magang</h3>
                    <div class="relative w-32 h-32 mx-auto">
                        <img src="https://placehold.co/100x100" alt="Pie chart showing 30% and 70%" class="w-full h-full">
                    </div>
                </div>
                <div class="bg-white p-6 rounded-md shadow-md">
                    <h3 class="text-lg font-bold mb-4 text-center">Detail Magang</h3>
                    <p class="mb-4">Bidang Magang: </p>
                    <p class="mb-4">Mentor: </p>
                    <p class="mb-4">Pembina: </p>
                    <div class="flex justify-center mt-6">
                        <button class="bg-[#FB991A] text-white px-40 py-2 rounded-md hover:bg-orange-600 transition duration-300">Nilai</button>
                    </div>
                </div>
            </div>
            <!-- <footer class="footer fixed-bottom bg-[#022539] text-white py-4 text-center text-sm mt-8">
                &copy; 2025 Diskominfo Semarang. All Rights Reserved.
            </footer> -->
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>