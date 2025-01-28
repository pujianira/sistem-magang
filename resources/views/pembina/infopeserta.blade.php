<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Info Peserta</title>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <script src="https://cdn.tailwindcss.com"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
       <div class="flex-1 flex flex-col">
           <div class="p-6 flex-1 overflow-y-auto">
               <!-- Top Bar -->
               <div class="flex justify-between items-center mb-6">
                   <h1 class="text-2xl font-bold">Peserta</h1>
               </div>

               <!-- Profile Content -->
               <div class="bg-white rounded-lg shadow-md p-6">
                   <!-- Profile Photo -->
                   <div class="flex justify-center mb-8">
                       <div class="w-24 h-24 bg-gray-500 rounded-full overflow-hidden">
                           <img src="https://via.placeholder.com/150" 
                                alt="Profile picture of John Doe" 
                                class="w-full h-full object-cover">
                       </div>
                   </div>

                   <!-- Profile Information -->
                   <div class="w-full md:w-3/3 mx-auto space-y-1">
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Nama</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $peserta->user->nama }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">NIM / NIS</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $peserta->nim_nisn }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Kontak</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $peserta->user->no_hp }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Universitas / Sekolah</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $peserta->universitas_sekolah }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Jurusan</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $peserta->jurusan }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Bidang</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $peserta->nama_bidang }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Periode</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $peserta->bulan_mulai }} {{ $peserta->tahun_mulai }}</p>
                           </div>
                       </div>       
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Status Pendaftaran</h4>
                               <p class="text-md text-green-600 font-bold inline-block bg-green-100 px-2 py-1 rounded">{{ $peserta->status_pendaftaran }}</p>
                           </div>
                       </div>           
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-[#FB991A] text-white px-6 py-2 rounded-md hover:bg-orange-600 transition duration-300 font-bold">
                            Beri Izin Cetak
                        </button>
                    </div>
                </div>
                <h1 class="text-lg font-bold mt-4 mb-2 p-4">Laporan Magang</h1>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Judul Laporan</h4>
                            <p class="text-md text-gray-800 w-2/3">--- Judul Laporan ---</p>
                        </div>
                    </div>
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Jenis Karya</h4>
                            <p class="text-md text-gray-800 w-2/3">--- Jenis Karya ---</p>
                        </div>
                    </div>
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Deskripsi Karya</h4>
                            <p class="text-md text-gray-800 w-2/3">--- Deskripsi Karya ---</p>
                        </div>
                    </div>
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Laporan</h4>
                            <p class="text-md text-gray-800 w-2/3">Laporan</p>
                        </div>
                    </div>
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Status Kelulusan</h4>
                            @if($peserta->status_kelulusan == 'Belum Mendaftar')
                                <p class="text-md text-gray-600 font-bold inline-block bg-gray-100 px-2 py-1 rounded">Belum Mendaftar</p>
                            @elseif($peserta->status_kelulusan == 'Aktif')
                                <p class="text-md text-yellow-800 font-bold inline-block bg-yellow-100 px-2 py-1 rounded">Aktif</p>
                            @elseif($peserta->status_kelulusan == 'Lulus')
                                <p class="text-md text-green-800 font-bold inline-block bg-green-100 px-2 py-1 rounded">Lulus</p>
                            @elseif($peserta->status_kelulusan == 'Tidak Lulus')
                                <p class="text-md text-red-800 font-bold inline-block bg-red-100 px-2 py-1 rounded">Tidak Lulus</p>
                            @else
                                <p class="text-md text-gray-600 font-bold inline-block bg-gray-100 px-2 py-1 rounded">Status Tidak Diketahui</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-[#FB991A] text-white px-6 py-2 rounded-md hover:bg-orange-600 transition duration-300 font-bold">
                            Beri Izin Cetak
                        </button>
                    </div>
                </div>
           </div>
       </div>
   </div>
</body>
</html>