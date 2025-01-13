<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembina</title>
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
        @include('layouts.sidebarp') 
        <!-- Main Content -->
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="relative mb-6">
                <!-- Welcome Banner -->
                <img src="img/orangwelcome.png" alt="Illustration of a person waving" class="absolute -top-12 right-0 w-60 h-40">
                <div class="bg-gradient-to-t from-[#1B7691] to-[#10BCEF] text-white p-10 rounded-md flex items-center mb-6 mt-8">
                    <h2 class="text-2xl font-bold">Selamat datang, Pembina Magang!</h2>
                </div>
            </div>
            <!-- Info Cards -->
            <div>
                <h2 class="text-xl font-bold mb-4">Statistik Pendaftar</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div class="bg-white p-6 rounded shadow text-center">
                        <p class="text-4xl text-orange-500 font-bold">40</p>
                        <p>Teknologi Informasi dan Komunikasi</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center">
                        <p class="text-4xl text-orange-500 font-bold">40</p>
                        <p>Statistik</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center">
                        <p class="text-4xl text-orange-500 font-bold">40</p>
                        <p>Informasi dan Komunikasi Publik</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center">
                        <p class="text-4xl text-orange-500 font-bold">40</p>
                        <p>E-Government</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center">
                        <p class="text-4xl text-orange-500 font-bold">40</p>
                        <p>Persandian dan Keamanan Informasi</p>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center">
                        <p class="text-4xl text-orange-500 font-bold">40</p>
                        <p>Sekretariat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>