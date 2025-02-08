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
                       <div class="w-24 h-24 bg-gray-500 rounded-lg overflow-hidden">
                       <a href="{{ asset('storage/'.$peserta->user->foto) }}" target="_blank">
                            <img src="{{ asset('storage/'.$peserta->user->foto) }}" 
                                alt="Profile picture" 
                                class="w-full h-full object-cover" 
                                id="preview">
                        </a>
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
                </div>
                <h1 class="text-lg font-bold mt-4 mb-2 p-4">Laporan Magang</h1>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Judul Laporan</h4>
                            <p class="text-md w-2/3 
                                @if (!$peserta->judul_laporan) italic text-gray-500 @else text-gray-800 @endif">
                                {{ $peserta->judul_laporan ?? 'Laporan belum dikirim' }}
                            </p>
                        </div>
                    </div>
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Jenis Karya</h4>
                            <p class="text-md w-2/3 
                                @if (!$peserta->jenis_karya) italic text-gray-500 @else text-gray-800 @endif">
                                {{ $peserta->jenis_karya ?? 'Laporan belum dikirim' }}
                            </p>
                        </div>
                    </div>
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Deskripsi Karya</h4>
                            <p class="text-md w-2/3 
                                @if (!$peserta->deskripsi_karya) italic text-gray-500 @else text-gray-800 @endif">
                                {{ $peserta->deskripsi_karya ?? 'Laporan belum dikirim' }}
                            </p>
                        </div>
                    </div>
                    <div class="p-3 rounded-md mb-1">
                        <div class="flex items-center">
                            <h4 class="text-base font-medium text-gray-500 w-1/3">Laporan</h4>
                            <div class="w-2/3">
                            <button 
                                onclick="window.open('{{ asset('storage/'.$peserta->laporan) }}')" 
                                class="inline-flex items-center gap-2 px-4 py-2 border rounded-md transition 
                                    @if ($peserta->laporan) bg-white border-gray-200 hover:bg-gray-50 
                                    @else bg-gray-200 text-gray-400 cursor-not-allowed @endif"
                                @if (!$peserta->laporan) disabled @endif
                            >
                                <span>Lihat Laporan</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                </svg>
                            </button>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 rounded-md mb-1">
                    <div class="flex items-center">
                        <h4 class="text-base font-medium text-gray-500 w-1/3">Nilai</h4>
                        <button 
                            onclick="showNilaiModal()"
                            class="inline-flex items-center gap-2 px-4 py-2 border rounded-md transition 
                                {{ $peserta->nilai ? 'bg-white border-gray-200 hover:bg-gray-50' : 'bg-gray-200 text-gray-400 cursor-not-allowed' }}"
                            {{ !$peserta->nilai ? 'disabled' : '' }}
                        >
                            <span>Lihat Nilai</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal untuk melihat nilai -->
                        <div id="nilaiModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
                            <div class="bg-white p-6 rounded-md shadow-lg w-full max-w-md">
                                <div class="flex justify-between items-center mb-4">
                                    <h2 class="text-lg font-semibold">Nilai Peserta</h2>
                                    <button onclick="hideNilaiModal()" class="text-gray-500 hover:text-gray-700">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                @if ($nilai)
            <div class="space-y-2">
                <div class="grid grid-cols-2 gap-2">
                    <p class="font-medium">Kehadiran:</p>
                    <p>{{ $nilai->kehadiran ?? 'Tidak Ada' }}</p>
                    <!-- Add other nilai fields similarly -->
                </div>
            </div>
        @else
            <p class="text-center py-4 text-gray-500">Nilai belum tersedia</p>
        @endif
        
        <div class="mt-6 text-center">
            <button onclick="hideNilaiModal()" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Tutup
            </button>
        </div>
    </div>
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
                    <div class="flex justify-end gap-4"> <!-- Tambahkan gap-4 untuk spacing antar button -->
                        <button onclick="konfirmasiSetujuKelulusan('{{ route('setujui.kelulusan', $peserta->nim_nisn) }}')" 
                                class="bg-green-500 text-white px-6 py-2 rounded-full hover:bg-green-600 transition duration-300 font-bold @if($peserta->status_kelulusan != 'Aktif') opacity-50 cursor-not-allowed @endif"
                                @if($peserta->status_kelulusan != 'Aktif') disabled @endif>
                            Setujui Kelulusan
                        </button>
                        
                        <button onclick="konfirmasiTolakKelulusan('{{ route('tolak.kelulusan', $peserta->nim_nisn) }}')" 
                                class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600 transition duration-300 font-bold @if($peserta->status_kelulusan != 'Aktif') opacity-50 cursor-not-allowed @endif"
                                @if($peserta->status_kelulusan != 'Aktif') disabled @endif>
                            Tolak Kelulusan
                        </button>
                    </div>
                </div>
           </div>
       </div>
   </div>
   <script>
    function konfirmasiSetujuKelulusan(url) {
        Swal.fire({
            title: 'Konfirmasi Kelulusan',
            text: "Apakah Anda yakin ingin menyetujui kelulusan peserta ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Setujui!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    function konfirmasiTolakKelulusan(url) {
        Swal.fire({
            title: 'Konfirmasi Penolakan Kelulusan',
            text: "Apakah Anda yakin ingin menolak kelulusan peserta ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    // Flash messages
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif
    function showNilaiModal() {
    document.getElementById('nilaiModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function hideNilaiModal() {
    document.getElementById('nilaiModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}
</script>
</body>
</html>