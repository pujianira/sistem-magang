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
        @include('layouts.sidebarp') 
        <!-- Main Content -->
        <div class="flex-1 overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-6">Peserta Magang</h1>
                <div class="bg-white rounded-lg shadow-md h-[calc(100vh-120px)] overflow-auto">
                    <div class="p-6">
                    <form action="/pembina/filterBidangPeserta" method="GET" class="mb-6">
                        <div class="mb-4 flex items-center">
                            <label for="bidang" class="mr-2 w-24 font-bold">Bidang:</label>
                            <select name="bidang" id="bidang" class="p-2 rounded bg-gray-200 text-gray-700 w-80">
                                <option value="">--- Pilih Bidang ---</option>
                                @foreach($bidangs as $bidang)
                                    <option value="{{ $bidang->id_bidang }}" {{ request('bidang') == $bidang->id_bidang ? 'selected' : '' }}>
                                        {{ $bidang->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                                Filter Data
                            </button>
                            <a href="/pembina/pendaftarmagang" class="bg-gray-600 text-white px-4 py-2 rounded-lg">
                                Reset Filter
                            </a>
                        </div>
                    </form>
                        <p class="mb-4">Total: {{ $totalPeserta }}</p>
                        <div class="w-full">
                            <table class="w-full table-auto border-collapse border border-gray-300">
                                <thead>
                                <tr class="bg-blue-900 text-white">
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-12">No</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/4">Nama</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Universitas / Sekolah</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Durasi Magang</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Bidang</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">Periode</th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-1/6">
                                        <a href="{{ route('pesertamagang', ['direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}" 
                                        class="flex items-center hover:text-gray-300 transition duration-200 ease-in-out">
                                            Status 
                                            <span class="ml-2">
                                                @if(request('direction') === 'asc')
                                                    <i class="fas fa-sort-up text-gray-600"></i>
                                                @elseif(request('direction') === 'desc')
                                                    <i class="fas fa-sort-down text-gray-600"></i>
                                                @else
                                                    <i class="fas fa-sort text-gray-400"></i>
                                                @endif
                                            </span>
                                        </a>
                                    </th>
                                    <th class="py-2 px-3 text-sm whitespace-nowrap border w-12"><i class="fas fa-search"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($pesertaData as $index => $pendaftar)
                                        <tr class="odd:bg-gray-100 even:bg-gray-200">
                                            <td class="py-2 px-3 text-sm border text-center">{{ $index + 1 }}</td>
                                            <td class="py-2 px-3 text-sm border">{{ $pendaftar->user->nama }}</td>
                                            <td class="py-2 px-3 text-sm border">{{ $pendaftar->universitas_sekolah }}</td>
                                            <td class="py-2 px-3 text-sm border">{{ $pendaftar->durasi }}</td>
                                            <td class="py-2 px-3 text-sm border">{{ $pendaftar->nama_bidang }}</td>
                                            <td class="py-2 px-3 text-sm border">{{ $pendaftar->bulan_mulai }} {{ $pendaftar->tahun_mulai }}</td>
                                            <td class="py-2 px-3 text-sm border text-center">
                                                @switch($pendaftar->status_kelulusan)
                                                    @case('Aktif')
                                                        <span class="items-center bg-yellow-100 text-green-800 px-2 py-1 rounded">
                                                            Aktif
                                                        </span>
                                                        @break
                                                    @case('Lulus')
                                                        <span class="items-center bg-green-100 text-yellow-800 px-2 py-1 rounded">
                                                            Lulus
                                                        </span>
                                                        @break
                                                    @case('Tidak Lulus')
                                                        <span class="items-center bg-red-100 text-red-800 px-2 py-1 rounded">
                                                            Tidak Lulus
                                                        </span>
                                                        @break
                                                    @case('Belum Mendaftar')
                                                        <span class="flex items-center bg-gray-300 text-gray-800 px-2 py-1 rounded">
                                                            Belum Mendaftar
                                                        </span>
                                                        @break
                                                    @default
                                                        <span class="bg-gray-300 text-gray-800 px-2 py-1 rounded">
                                                            Tidak diketahui
                                                        </span>
                                                @endswitch
                                            </td>
                                            <td class="py-2 px-3 text-sm border text-center">
                                                <a href="/pembina/infopeserta/{{ $pendaftar->nim_nisn }}" class="text-blue-600">
                                                    <i class="fas fa-eye cursor-pointer"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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