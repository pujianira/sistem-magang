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
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->user->nama }}</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Tempat / Tanggal Lahir</h4>
                               <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->tempat_lahir }} / {{ \Carbon\Carbon::parse($pendaftar->ttl)->format('d-m-Y') }}</p>
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
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Surat Permohonan</h4>
                               <p class="text-md text-gray-800 w-2/3">Sistem Informasi</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Proposal</h4>
                               <p class="text-md text-gray-800 w-2/3">Maret 2025</p>
                           </div>
                       </div>
                       <div class="p-3 rounded-md mb-1">
                           <div class="flex items-center">
                               <h4 class="text-base font-medium text-gray-500 w-1/3">Curriculum Vitae</h4>
                               <p class="text-md text-gray-800 w-2/3">E-Government</p>
                           </div>
                       </div>
                   </div>
                   <!-- <div class="flex mt-10 justify-end">
                        <button onclick="konfirmasiSetuju('{{ route('terima.pendaftaran', $pendaftar->nim_nisn) }}')" 
                                class="bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-full mr-4 {{ $pendaftar->status_pendaftaran != 'Pending' ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ $pendaftar->status_pendaftaran != 'Pending' ? 'disabled' : '' }}>
                            Terima Pengajuan
                        </button>
                        
                        <button onclick="konfirmasiTolak('{{ route('tolak.pendaftaran', $pendaftar->nim_nisn) }}')" 
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-full {{ $pendaftar->status_pendaftaran != 'Pending' ? 'opacity-50 cursor-not-allowed' : '' }}"
                                {{ $pendaftar->status_pendaftaran != 'Pending' ? 'disabled' : '' }}>
                            Tolak Pengajuan
                        </button>
                    </div> -->
                    <!-- <div class="flex mt-10 justify-end">
                        @if ($pendaftar->status_pendaftaran == 'Pending')
                            <button onclick="konfirmasiSetuju('{{ route('terima.pendaftaran', $pendaftar->nim_nisn) }}')" 
                                    class="bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-full mr-4">
                                Terima Pengajuan
                            </button>
                            
                            <button onclick="konfirmasiTolak('{{ route('tolak.pendaftaran', $pendaftar->nim_nisn) }}')" 
                                    class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-full">
                                Tolak Pengajuan
                            </button>
                        @else
                            <button disabled 
                                    class="bg-green-500 hover:bg-green-600 text-white py-2 px-6 rounded-full mr-4 opacity-50 cursor-not-allowed">
                                Terima Pengajuan
                            </button>
                            
                            <button disabled
                                    class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-full opacity-50 cursor-not-allowed">
                                Tolak Pengajuan
                            </button>
                        @endif
                    </div> -->
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
   </script>
</body>
</html>