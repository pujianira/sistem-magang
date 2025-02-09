<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Info Pendaftar</title>
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
                   <h1 class="text-2xl font-bold">Pendaftar</h1>
               </div>

               <!-- Profile Content -->
               <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-center mb-8">
                        <div class="w-40 h-30 bg-gray-500 rounded-lg overflow-hidden relative group cursor-pointer" 
                            onclick="openImageModal('{{ $pendaftar->user->foto ? asset('storage/'.$pendaftar->user->foto) : asset('img/default-avatar.jpg') }}')">
                            <img src="{{ $pendaftar->user->foto ? asset('storage/'.$pendaftar->user->foto) : asset('img/default-avatar.jpg') }}" 
                                alt="Profile picture" 
                                class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                   <!-- Profile Information -->
                   <div class="w-full md:w-3/3 mx-auto space-y-1">
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Nama</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->user->nama }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Tempat / Tanggal Lahir</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->tempat_lahir }} / {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d-m-Y') }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Agama</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->agama }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Jenis Kelamin</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->jenis_kelamin }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Alamat Lengkap</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->user->alamat }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">No HP</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->user->no_hp }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Universitas / Sekolah</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->universitas_sekolah }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">NIM / NIS</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->nim_nisn }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">NIK</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->nik }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Jurusan</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->jurusan }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Periode</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->bulan_mulai }} {{ $pendaftar->tahun_mulai }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Bidang</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->nama_bidang }}</p>
                           </div>
                       </div>
                        <div class="p-3 rounded-md mb-1">
                            <div class="flex items-center">
                                <h4 class="text-gray-500 font-medium w-1/3">Surat Permohonan</h4>
                                <div class="w-2/3">
                                    <button 
                                        onclick="window.open('{{ asset('storage/'.$pendaftar->surat_permohonan) }}')" 
                                        class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-md hover:bg-gray-50"
                                    >
                                        <span>Lihat Surat</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 rounded-md mb-1">
                            <div class="flex items-center">
                                <h4 class="text-base font-medium text-gray-500 w-1/3">Proposal</h4>
                                    <div class="w-2/3">
                                        <button 
                                            onclick="window.open('{{ asset('storage/'.$pendaftar->proposal) }}')" 
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-md hover:bg-gray-50"
                                        >
                                            <span>Lihat Proposal</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                        </button>
                                    </div>
                            </div>
                        </div>
                        <div class="p-3 rounded-md mb-1">
                            <div class="flex items-center">
                                <h4 class="text-base font-medium text-gray-500 w-1/3">Curriculum Vitae</h4>
                                    <div class="w-2/3">
                                        <button 
                                            onclick="window.open('{{ asset('storage/'.$pendaftar->curriculum_vitae) }}')" 
                                            class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 rounded-md hover:bg-gray-50"
                                        >
                                            <span>Lihat CV</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg>
                                        </button>
                                    </div>
                            </div>
                        </div>
                    <div class="flex mt-10 justify-end">
                        <button onclick="konfirmasiSetuju('{{ route('terima.pendaftaran', $pendaftar->nim_nisn) }}')" 
                                class="bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-full mr-4 @if($pendaftar->status_pendaftaran != 'Menunggu') opacity-50 cursor-not-allowed @endif"
                                @if($pendaftar->status_pendaftaran != 'Menunggu') disabled @endif>
                            Terima Pengajuan
                        </button>
                        
                        <button onclick="konfirmasiTolak('{{ route('tolak.pendaftaran', $pendaftar->nim_nisn) }}')" 
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-full @if($pendaftar->status_pendaftaran != 'Menunggu') opacity-50 cursor-not-allowed @endif"
                                @if($pendaftar->status_pendaftaran != 'Menunggu') disabled @endif>
                            Tolak Pengajuan
                        </button>
                    </div>
               </div>
           </div>
       </div>
   </div>
   <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="relative bg-white p-4 rounded-lg" style="max-width: 300px;">
            <!-- Tombol Close -->
            <div class="relative">
                <button type="button" onclick="closeImageModal()" class="absolute top-0 right-0 p-2 text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        <img id="modalImage" src="" alt="Preview" class="w-full h-auto object-contain rounded">
   </div>
</div>

   <!-- Scripts -->
   <script>
       function konfirmasiSetuju(url) {
           Swal.fire({
               title: 'Konfirmasi Penerimaan',
               text: "Apakah Anda yakin ingin menerima pendaftaran ini?",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonColor: '#3085d6',
               cancelButtonColor: '#d33',
               confirmButtonText: 'Ya, Terima!',
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

       function konfirmasiTolak(url) {
           Swal.fire({
               title: 'Konfirmasi Penolakan',
               text: "Apakah Anda yakin ingin menolak pendaftaran ini?",
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

       function openImageModal(imageSrc) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageSrc;
        modal.style.display = 'flex';

        // Mencegah scrolling pada background
        document.body.style.overflow = 'hidden';
    }

    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        modal.style.display = 'none';
        
        // Mengembalikan scrolling
        document.body.style.overflow = 'auto';
    }
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeImageModal();
        }
    });
   </script>
</body>
</html>