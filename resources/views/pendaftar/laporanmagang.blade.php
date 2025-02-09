<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Magang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        label {
            text-align: left; /* Rata kiri */
        }
        .file-input-wrapper {
            border: 1px solid #d1d5db; /* Border penuh */
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .file-input-wrapper input[type="file"] {
            border: none;
            padding: 0.5rem;
            flex-grow: 1;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('layouts.sidebard')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <div class="p-6 flex-1 overflow-y-auto">
                <!-- Top Bar -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl font-bold">Laporan Magang</h1>
                </div>
                @if ($pendaftar->status_kelulusan == 'Belum Mendaftar')
                    <div class="bg-white p-10 rounded-lg shadow-lg text-center fade-in border border-gray-300">
                        <div class="flex flex-col items-center">
                            <!-- Ikon Gembok Terkunci -->
                            <div class="relative w-20 h-20 flex items-center justify-center bg-gray-100 rounded-full shadow-lg">
                                <svg class="w-14 h-14 text-gray-700 animate-wiggle" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10V8a7 7 0 0114 0v2m-7 5v3m-4 0h8m1-5a2 2 0 00-2-2H7a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2H7z" />
                                </svg>                                
                            </div>
                    
                            <!-- Pesan -->
                            <h2 class="text-2xl font-bold text-gray-800 mt-4">Mohon maaf, halaman ini tidak dapat diakses.</h2>
                            <p class="text-gray-700 mt-2">Anda tidak dapat mengakses halaman ini karena belum melakukan pendaftaran.</p>
                        </div>
                    </div>
                    
                    <style>
                        .fade-in {
                            animation: fadeIn 1.5s ease-in-out forwards;
                        }
                        @keyframes fadeIn {
                            0% { opacity: 0; transform: translateY(10px); }
                            100% { opacity: 1; transform: translateY(0); }
                        }
                    </style>                               
                @elseif ($pendaftar->status_kelulusan == 'Proses Pendaftaran')
                    <div class="bg-white p-10 rounded-md shadow-md text-center">
                        <div class="flex flex-col items-center">
                            <svg class="w-16 h-16 text-blue-500 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V13H5v4h4zm10 0v-6h-4v6h4zm-6 0v-8H9v8h4zm0-10V5H5v2h8z" />
                            </svg>
                            <h2 class="text-xl font-bold text-gray-800 mt-4">Pendaftaran Anda dalam Proses</h2>
                            <p class="text-gray-600 mt-2">Mohon maaf, Anda tidak dapat mengakses halaman ini karena pendaftaran magang Anda sedang diproses.</p>
                            <div class="mt-4 p-3 bg-blue-100 border border-blue-300 rounded-lg text-blue-800">
                                <p><strong>Status:</strong> Pendaftaran sedang diproses</p>
                            </div>
                        </div>
                    </div>
                    
                    <style>
                    .fade-in {
                        animation: fadeIn 1.5s ease-in-out forwards;
                    }
                    @keyframes fadeIn {
                        0% { opacity: 0; transform: translateY(10px); }
                        100% { opacity: 1; transform: translateY(0); }
                    }
                    </style>
                @elseif ($pendaftar->status_kelulusan == 'Aktif')
                    <!-- Form Content -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Form Fields -->
                            <div class="w-full mx-auto space-y-6">
                                <!-- Judul -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="judul_laporan">Judul</label>
                                    <input type="text" id="judul_laporan" name="judul_laporan" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- Jenis Karya -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="jenis_karya">Jenis Karya</label>
                                    <input type="text" id="jenis_karya" name="jenis_karya" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- Deskripsi Karya -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="deskripsi_karya">Deskripsi Karya</label>
                                    <textarea id="deskripsi_karya" name="deskripsi_karya" required rows="3"
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                                </div>

                                <!-- Laporan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="laporan">Laporan</label>
                                    <div class="file-input-wrapper">
                                        <input type="file" id="laporan" name="laporan" accept=".pdf,.doc,.docx" required>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-[#FB991A] text-white px-40 py-2 rounded-md hover:bg-orange-600 transition duration-300 font-bold">
                                        Kirim Laporan
                                    </button>
                                    <input type="hidden" id="tanggal_kirimlaporan" name="tanggal_kirimlaporan">
                                </div>
                            </div>
                        </form>
                    </div>
                @elseif ($pendaftar->status_kelulusan == 'Proses Pemeriksaan')
                    <div class="bg-white p-10 rounded-lg shadow-lg text-center fade-in border border-blue-200">
                        <div class="flex flex-col items-center">
                            <!-- Ikon Pemeriksaan -->
                            <div class="relative w-20 h-20 flex items-center justify-center bg-blue-100 rounded-full shadow-md">
                                <svg class="w-12 h-12 text-blue-500 animate-pulse" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V13H5v4h4zm10 0v-6h-4v6h4zm-6 0v-8H9v8h4zm0-10V5H5v2h8z" />
                                </svg>
                            </div>
                    
                            <!-- Pesan -->
                            <h2 class="text-2xl font-bold text-blue-600 mt-4">Laporan Anda dalam Proses Pemeriksaan</h2>
                            <p class="text-gray-700 mt-2">Mohon tunggu, laporan Anda sedang diperiksa oleh kami.</p>
                    
                            <!-- Badge Status -->
                            <div class="mt-4 px-4 py-2 bg-blue-100 border border-blue-300 rounded-lg text-blue-800">
                                <p><strong>Status:</strong> Proses pemeriksaan laporan ⏳</p>
                            </div>
                        </div>
                    </div>
                    
                    <style>
                        .fade-in {
                            animation: fadeIn 1.5s ease-in-out forwards;
                        }
                        @keyframes fadeIn {
                            0% { opacity: 0; transform: translateY(10px); }
                            100% { opacity: 1; transform: translateY(0); }
                        }
                    </style>                
                @elseif ($pendaftar->status_kelulusan == 'Lulus')
                    <div class="bg-white p-10 rounded-lg shadow-lg text-center fade-in border border-green-200">
                        <div class="flex flex-col items-center">
                            <!-- Ikon Berhasil -->
                            <div class="relative w-20 h-20 flex items-center justify-center bg-green-100 rounded-full shadow-md">
                                <svg class="w-12 h-12 text-green-500 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                    
                            <!-- Pesan -->
                            <h2 class="text-2xl font-bold text-green-600 mt-4">Selamat, Anda Lulus Magang!</h2>
                            <p class="text-gray-700 mt-2">Anda telah menyelesaikan dan lulus magang di bidang <span class="font-semibold">{{ $pendaftar->nama_bidang }}</span>.</p>
            
                            <!-- Tombol Unduh -->
                            <a href="{{ route('cetaksuratkelulusan') }}" 
                            class="mt-6 inline-block bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300 font-semibold shadow-md">
                                🎓 Unduh Surat Kelulusan
                            </a>

                            {{-- <div class="flex items-center">
                                <h4 class="text-base font-medium text-gray-500 w-1/3">Nilai</h4>
                                <button 
                                    onclick="showNilaiModal()"
                                    class="inline-flex items-center gap-2 px-4 py-2 border rounded-md transition 
                                        {{ $pendaftar->nilai ? 'bg-white border-gray-200 hover:bg-gray-50' : 'bg-gray-200 text-gray-400 cursor-not-allowed' }}"
                                    {{ !$pendaftar->nilai ? 'disabled' : '' }}
                                >
                                    <span>Lihat Nilai</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="7" y1="17" x2="17" y2="7"></line>
                                        <polyline points="7 7 17 7 17 17"></polyline>
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
                            </div> --}}
                    
                            <!-- Informasi Tambahan -->
                            <div class="mt-6">
                                <p class="text-gray-600">Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi pembina magang Anda.</p>
                            </div>
                        </div>
                    </div>
                    
                    <style>
                        .fade-in {
                            animation: fadeIn 1.5s ease-in-out forwards;
                        }
                        @keyframes fadeIn {
                            0% { opacity: 0; transform: translateY(10px); }
                            100% { opacity: 1; transform: translateY(0); }
                        }
                    </style>                
                @elseif ($pendaftar->status_kelulusan == 'Tidak Lulus')
                    <div class="bg-white p-10 rounded-lg shadow-lg text-center fade-in border border-red-200">
                        <div class="flex flex-col items-center">
                            <!-- Ikon Penolakan -->
                            <div class="relative w-20 h-20 flex items-center justify-center bg-red-100 rounded-full shadow-md">
                                <svg class="w-12 h-12 text-red-500 animate-pulse" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                    
                            <!-- Pesan -->
                            <h2 class="text-2xl font-bold text-red-600 mt-4">Mohon Maaf, Anda Tidak Lulus</h2>
                            <!-- Informasi Tambahan -->
                            <div class="mt-4 p-3 bg-red-100 border border-red-300 rounded-lg text-red-800">
                                <p><strong>Status:</strong> Tidak Lulus</p>
                                <p class="text-sm">Silakan hubungi pembina atau pembimbing Anda untuk informasi lebih lanjut. Semangat!</p>
                            </div>
                        </div>
                    </div>
                    
                    <style>
                        .fade-in {
                            animation: fadeIn 1.5s ease-in-out forwards;
                        }
                        @keyframes fadeIn {
                            0% { opacity: 0; transform: translateY(10px); }
                            100% { opacity: 1; transform: translateY(0); }
                        }
                    </style>                              
                @endif
            </div>
        </div>
    </div>

    <script>
        document.querySelector('button[type="submit"]').addEventListener('click', function() {
            const tanggal = new Date().toLocaleDateString('id-ID'); 

            document.getElementById('tanggal_kirimlaporan').value = tanggal;
        });
        // document.addEventListener("DOMContentLoaded", function() {
        //     const form = document.querySelector("form");
        //     const button = form.querySelector("button[type='submit']");
        //     const formContainer = document.querySelector(".bg-white"); 

        //     form.addEventListener("submit", function(event) {
        //         event.preventDefault(); 

        //         // Set tanggal daftar otomatis
        //         const tanggal = new Date().toLocaleDateString('id-ID');
        //         document.getElementById('tanggal_kirimlaporan').value = tanggal;

        //         // Ganti tombol menjadi loading
        //         button.innerHTML = "Mengirim...";
        //         button.disabled = true;
        //         button.classList.add("opacity-50", "cursor-not-allowed");

        //         // Kirim form secara AJAX
        //         const formData = new FormData(form);
        //         fetch("{{ route('pendaftaran.store') }}", {
        //             method: "POST",
        //             body: formData,
        //             headers: {
        //                 "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        //             }
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data.success) {
        //                 formContainer.innerHTML = `
        //                     <div class="text-center py-10">
        //                         <h2 class="text-2xl font-bold text-gray-800">Laporan Sedang Diperiksa</h2> 
        //                         <p class="text-gray-600 mt-2">Mohon tunggu, kami akan segera menghubungi Anda.</p> 
        //                     </div>
        //                 `;
        //             } else {
        //                 Swal.fire({
        //                     icon: "error",
        //                     title: "Gagal",
        //                     text: data.message || "Terjadi kesalahan saat pengiriman laporan." 
        //                 });
        //                 button.innerHTML = "Kirim Laporan"; 
        //                 button.disabled = false;
        //                 button.classList.remove("opacity-50", "cursor-not-allowed");
        //             }
        //         })
        //         .catch(error => {
        //             console.error("Terjadi kesalahan:", error);
        //             Swal.fire({
        //                 icon: "error",
        //                 title: "Gagal",
        //                 text: "Terjadi kesalahan saat mengirim data."
        //             });
        //             button.innerHTML = "Kirim Laporan"; 
        //             button.disabled = false;
        //             button.classList.remove("opacity-50", "cursor-not-allowed");
        //         });
        //     });
        // });
    </script>
</body>
</html>
