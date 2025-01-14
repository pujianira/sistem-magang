<!-- Sidebar Pendaftar (Siswa/Mahasiswa) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peserta Magang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
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
        <div class="flex-1 overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-6">Peserta Magang</h1>
                <div class="bg-white rounded-lg shadow-md h-[calc(100vh-120px)] overflow-auto">
                    <div class="p-6">
                        <form action="#" method="GET" class="mb-6">
                            <div class="mb-4 flex items-center">
                                <label for="status" class="mr-2 w-24 font-bold">Status:</label>
                                <select name="status" id="status" class="p-2 rounded bg-gray-200 text-gray-700 w-60">
                                    <option value="">--- Pilih Status ---</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Lulus">Lulus</option>
                                </select>
                            </div>
                            <div class="flex space-x-4">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                                    Filter Data
                                </button>
                                <a href="#" class="bg-gray-600 text-white px-4 py-2 rounded-lg">
                                    Reset Filter
                                </a>
                            </div>
                        </form>
                        <p class="mb-4">Total: 42</p>
                        <div class="w-full">
                            <table class="w-full table-auto border-collapse border border-gray-300">
                                <thead>
                                <tr class="bg-blue-900 text-white">
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-12">No</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/4">Nama</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Universitas / Sekolah</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Durasi Magang</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Kontak</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Periode</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Status</th>
                                    
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-12"><i class="fas fa-search"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd:bg-gray-100 even:bg-gray-200">
                                        <td class="py-2 px-3 text-sm border text-center">1</td>
                                        <td class="py-2 px-3 text-sm border">Ahmad Fauzan</td>
                                        <td class="py-2 px-3 text-sm border">24060122130080</td>
                                        <td class="py-2 px-3 text-sm border">Universitas Diponegoro</td>
                                        <td class="py-2 px-3 text-sm border">Teknik Informatika</td>
                                        <td class="py-2 px-3 text-sm border">Teknologi Informasi</td>
                                        <td class="py-2 px-3 text-sm border">2025-01-10</td>
                                        
                                        <td class="py-2 px-3 text-sm border text-center"><i class="fas fa-eye text-blue-600 cursor-pointer"></i></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-gray-200">
                                        <td class="py-2 px-3 text-sm border text-center">2</td>
                                        <td class="py-2 px-3 text-sm border">Siti Aisyah</td>
                                        <td class="py-2 px-3 text-sm border">210123457</td>
                                        <td class="py-2 px-3 text-sm border">Universitas Gadjah Mada</td>
                                        <td class="py-2 px-3 text-sm border">Manajemen</td>
                                        <td class="py-2 px-3 text-sm border">Keuangan</td>
                                        <td class="py-2 px-3 text-sm border">2025-01-09</td>
                                        <td class="py-2 px-3 text-sm border text-center"><i class="fas fa-eye text-blue-600 cursor-pointer"></i></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-gray-200">
                                        <td class="py-2 px-3 text-sm border text-center">3</td>
                                        <td class="py-2 px-3 text-sm border">Budi Santoso</td>
                                        <td class="py-2 px-3 text-sm border">210123458</td>
                                        <td class="py-2 px-3 text-sm border">Institut Teknologi Bandung</td>
                                        <td class="py-2 px-3 text-sm border">Desain Komunikasi Visual</td>
                                        <td class="py-2 px-3 text-sm border">Pemasaran</td>
                                        <td class="py-2 px-3 text-sm border">2025-01-08</td>
                                        <td class="py-2 px-3 text-sm border text-center"><i class="fas fa-eye text-blue-600 cursor-pointer"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>