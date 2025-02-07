<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Magang</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        label {
            text-align: left; 
        }
        .file-input-wrapper {
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        .file-input-wrapper input[type="file"] {
            border: none;
            padding-top: 0.5rem;
            flex-grow: 1;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('layouts.sidebard')

        {{-- @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: "{{ session('success') }}",
                    timer: 1500,
                    showConfirmButton: false
                });
            </script>
        @endif --}}
        {{-- @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: "{{ session('success') }}",
                        timer: 1500,
                        showConfirmButton: false
                    });
                });
            </script>
        @endif --}}

        <!-- Konten -->
        <div class="flex-1 flex flex-col">
            <div class="p-6 flex-1 overflow-y-auto">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-xl font-bold">Pendaftaran Magang</h1>
                </div>

                @if ($pendaftar->status_pendaftaran == 'Belum Mendaftar')
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="w-full mx-auto space-y-6">
                                <!-- Pas Foto -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="foto">Pas Foto</label>
                                    <div class="file-input-wrapper">
                                        <input type="file" id="foto" name="foto" accept="image/*" required>
                                        @error('foto')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nama -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <div class="flex space-x-4">
                                    <!-- Tempat Lahir -->
                                    <div class="flex-1">
                                        <label class="block text-sm font-medium text-gray-800 mb-1" for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                            class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                
                                    <!-- Tanggal Lahir -->
                                    <div class="flex-1">
                                        <label class="block text-sm font-medium text-gray-800 mb-1" for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                            class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </div>
                                </div>

                                <!-- Agama -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="agama">Agama</label>
                                    <select id="agama" name="agama" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">--- Pilih Agama ---</option>
                                        <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                        <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                        <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                        <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                        <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                        <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                    </select>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1">Jenis Kelamin</label>
                                    <div class="flex gap-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required
                                                class="form-radio text-blue-500 h-4 w-4">
                                            <span class="ml-2">Laki-laki</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }} required
                                                class="form-radio text-blue-500 h-4 w-4">
                                            <span class="ml-2">Perempuan</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Alamat -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="alamat">Alamat Lengkap</label>
                                    <textarea id="alamat" name="alamat" value="{{ old('alamat') }}" required rows="3"
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </textarea>
                                </div>

                                <!-- No HP -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="no_hp">Nomor Telepon</label>
                                    <input type="number" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- Universitas/Sekolah -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="univ_sekolah">Universitas/Sekolah</label>
                                    <input type="text" id="univ_sekolah" name="univ_sekolah" value="{{ old('univ_sekolah') }}" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- NIM/NISN -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="nim_nisn">NIM/NISN</label>
                                    <input type="number" id="nim_nisn" name="nim_nisn" value="{{ old('nim_nisn') }}" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- NIK -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="nik">NIK</label>
                                    <input type="number" id="nik" name="nik" value="{{ old('nik') }}" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- Jurusan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="jurusan">Jurusan</label>
                                    <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan') }}" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- Periode Mulai -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="periode_mulai">Periode Mulai</label>
                                    <select id="periode_mulai" name="periode_mulai" required
                                        class="text-md text-gray-800 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">--- Pilih Periode ---</option>
                                        @foreach($periode as $periode)
                                            <option value="{{ $periode->bulan }}-{{ $periode->tahun }}"
                                                {{ old('periode_mulai', $pendaftar->periode_mulai ?? '') == "$periode->bulan-$periode->tahun" ? 'selected' : '' }}>{{ $periode->bulan }} {{ $periode->tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Durasi -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="durasi">Durasi (dalam bulan)</label>
                                    <input type="number" id="durasi" name="durasi" value="{{ old('durasi') }}" min="1" max="12" required
                                        class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </div>

                                <!-- Periode Selesai -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="periode_selesai">Periode Selesai</label>
                                    <input type="text" id="periode_selesai" name="periode_selesai" readonly
                                        class="w-full border rounded-md px-3 py-2 bg-gray-100 text-gray-800 focus:outline-none">
                                </div>

                                <!-- Bidang -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="bidang">Bidang</label>
                                    <select id="bidang" name="bidang" required
                                        class="text-md text-gray-800 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="">--- Pilih Bidang ---</option>
                                        @foreach($bidang as $bidang)
                                            <option value="{{ $bidang->id_bidang }}" {{ old('bidang') == $bidang->id_bidang ? 'selected' : '' }}>{{ $bidang->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Surat Permohonan -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="surat_permohonan">Surat Permohonan</label>
                                    <div class="file-input-wrapper">
                                        <input type="file" id="surat_permohonan" name="surat_permohonan" accept=".pdf,.doc,.docx" required>
                                        @error('surat_permohonan')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Proposal -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="proposal">Proposal</label>
                                    <div class="file-input-wrapper">
                                        <input type="file" id="proposal" name="proposal" accept=".pdf,.doc,.docx" required>
                                        @error('proposal')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- CV -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-800 mb-1" for="cv">Curriculum Vitae</label>
                                    <div class="file-input-wrapper">
                                        <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
                                        @error('cv')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="flex justify-end">
                                    <button type="submit"
                                        class="bg-[#FB991A] text-white px-40 py-2 rounded-md hover:bg-orange-600 transition duration-300 font-bold">
                                        Daftar
                                    </button>
                                    <input type="hidden" id="tanggal_daftar" name="tanggal_daftar">
                                </div>
                            </div>
                        </form>
                    </div>
                @elseif ($pendaftar->status_pendaftaran == 'Menunggu')
                    {{-- <div class="bg-white p-10 rounded-md shadow-md">Pendaftaran Anda berhasil. Mohon ditunggu untuk penerimaan magang. Pendaftaran sedang diproses.<div> --}}
                        <div class="bg-white p-10 rounded-md shadow-md text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-16 h-16 text-blue-500 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V13H5v4h4zm10 0v-6h-4v6h4zm-6 0v-8H9v8h4zm0-10V5H5v2h8z" />
                                </svg>
                                <h2 class="text-xl font-bold text-gray-800 mt-4">Pendaftaran Anda Berhasil!</h2>
                                <p class="text-gray-600 mt-2">Mohon ditunggu, kami akan segera memproses dan mengumumkan hasil penerimaan Anda.</p>
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
                @elseif ($pendaftar->status_pendaftaran == 'Diterima')
                    {{-- <div class="bg-white p-10 rounded-md shadow-md">Selamat, Anda diterima magang di bidang {{ $pendaftar->nama_bidang }}. Silakan mengunduh surat penerimaan di bawah ini.<div> --}}
                        <div class="bg-white p-10 rounded-md shadow-md text-center">
                            <!-- Ikon Berhasil -->
                            <div class="flex justify-center mb-4">
                                <svg class="w-16 h-16 text-green-500 animate-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">Selamat, Anda Diterima Magang!</h2>
                            <p class="text-gray-600 mb-4">Anda diterima di bidang <span class="font-semibold">{{ $pendaftar->nama_bidang }}</span>.</p>
                            {{-- <p class="text-gray-600 mb-4">Silakan unduh surat penerimaan magang Anda.</p> --}}
                        
                            {{-- <div class="bg-green-100 p-4 rounded-md text-green-700 border border-green-300 mb-6">
                                <p class="font-medium">Surat Penerimaan Magang</p>
                                <p>Silakan klik tombol di bawah untuk mengunduh surat penerimaan Anda.</p>
                            </div> --}}
                        
                            <!-- Tombol Unduh -->
                            {{-- <a href="{{ route( 'surat.penerimaan', $pendaftar->id) }}" class="inline-block bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300 font-semibold">
                                Unduh Surat Penerimaan
                            </a> --}}
                            <a href="{{ route('cetaksuratpenerimaan') }}" class="inline-block bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 transition duration-300 font-semibold">
                                Unduh Surat Penerimaan
                            </a>
                            <!-- Informasi Tambahan -->
                            <div class="mt-6">
                                <p class="text-gray-600">Jika Anda memiliki pertanyaan atau membutuhkan bantuan, jangan ragu untuk menghubungi pembina magang Anda.</p>
                            </div>
                        </div>
                        
                @elseif ($pendaftar->status_pendaftaran == 'Ditolak')
                    {{-- <div class="bg-white p-10 rounded-md shadow-md">Mohon maaf, Anda tidak diterima magang ini karena berkas kurang lengkap atau kuota sudah penuh. Silakan coba di lain waktu.<div> --}}
                        <div class="bg-white p-10 rounded-md shadow-md text-center">
                            <!-- Ikon Penolakan -->
                            <svg class="w-12 h-12 mx-auto text-red-500 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            
                            <!-- Pesan -->
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">Mohon maaf, Anda Tidak Diterima</h3>
                            <p class="text-gray-600 mb-6">Mohon maaf, Anda tidak diterima magang ini karena berkas kurang lengkap atau kuota sudah penuh. <br>Silakan coba di lain kesempatan ya. Semangat!</p>
                        
                            <!-- Tips atau CTA -->
                            {{-- <div>
                                <p class="text-gray-700 mb-4">Jika Anda memiliki pertanyaan lebih lanjut atau membutuhkan klarifikasi mengenai proses pendaftaran, Anda bisa menghubungi kami di bawah ini:</p>
                        
                                <!-- Kontak -->
                                <div class="flex justify-center mb-6">
                                    <a href="mailto:contact@example.com" class="text-blue-500 hover:underline mr-4">Email Kami</a>
                                    <a href="tel:+628123456789" class="text-blue-500 hover:underline">Hubungi via Telepon</a>
                                </div> --}}
                        
                                <!-- CTA Coba Lagi -->
                                {{-- <a href="{{ route('pendaftaran.create') }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                                    Coba Daftar Lagi
                                </a> --}}
                            </div>
                        </div>                        
                @endif
            </div>
        </div>
    </div>

    <script>
        document.getElementById("durasi").addEventListener("input", hitungPeriodeSelesai);
        document.getElementById("periode_mulai").addEventListener("change", hitungPeriodeSelesai);

        function hitungPeriodeSelesai() {
            const periodeMulai = document.getElementById("periode_mulai").value; 
            const durasi = parseInt(document.getElementById("durasi").value);
            const periodeSelesai = document.getElementById("periode_selesai");

            if (durasi > 0 && periodeMulai) {
                const namaBulan = [
                    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                ];

                const [bulanMulai, tahunMulai] = periodeMulai.trim().split("-");
                const bulanMulaiAngka = namaBulan.indexOf(bulanMulai) + 1; 
                const tahunMulaiAngka = parseInt(tahunMulai);

                if (bulanMulaiAngka > 0 && !isNaN(tahunMulaiAngka)) {
                    const totalBulan = (tahunMulaiAngka * 12 + bulanMulaiAngka - 1) + durasi;
                    const tahunSelesai = Math.floor(totalBulan / 12);
                    const bulanSelesaiAngka = (totalBulan % 12) + 1;

                    periodeSelesai.value = `${namaBulan[bulanSelesaiAngka - 1]} ${tahunSelesai}`;
                } else {
                    periodeSelesai.value = "Format Periode Tidak Valid";
                }
            } else {
                periodeSelesai.value = ""; 
            }
        }

        document.querySelector('button[type="submit"]').addEventListener('click', function() {
            const tanggal = new Date().toLocaleDateString('id-ID'); 

            document.getElementById('tanggal_daftar').value = tanggal;
        });

        // document.addEventListener("DOMContentLoaded", function() {
        //     const form = document.querySelector("form");
        //     const button = form.querySelector("button[type='submit']");
        //     const formContainer = document.querySelector(".bg-white"); // Container form

        //     form.addEventListener("submit", function(event) {
        //         event.preventDefault(); // Mencegah reload otomatis

        //         // Set tanggal daftar otomatis
        //         // const tanggal = new Date().toLocaleDateString('id-ID');
        //         // document.getElementById('tanggal_daftar').value = tanggal;
        //         const now = new Date();
        //         const day = String(now.getDate()).padStart(2, '0'); // Tambah 0 jika 1 digit
        //         const month = String(now.getMonth() + 1).padStart(2, '0'); // Tambah 0 jika 1 digit
        //         const year = now.getFullYear();
        //         const tanggal = `${day}/${month}/${year}`; // Format jadi dd/mm/yyyy

        //         document.getElementById('tanggal_daftar').value = tanggal;

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
        //                         <h2 class="text-2xl font-bold text-gray-800">Pendaftaran Sedang Diproses</h2>
        //                         <p class="text-gray-600 mt-2">Mohon tunggu, kami akan menghubungi Anda.</p>
        //                     </div>
        //                 `;
        //             } else {
        //                 Swal.fire({
        //                     icon: "error",
        //                     title: "Gagal",
        //                     text: data.message || "Terjadi kesalahan saat pendaftaran."
        //                 });
        //                 button.innerHTML = "Daftar";
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
        //             button.innerHTML = "Daftar";
        //             button.disabled = false;
        //             button.classList.remove("opacity-50", "cursor-not-allowed");
        //         });
        //     });
        // });

        // document.querySelector('button[type="submit"]').addEventListener('click', function(event) {
        //     event.preventDefault(); 

        //     const tanggal = new Date().toLocaleDateString('id-ID'); 
        //     document.getElementById('tanggal_daftar').value = tanggal;

        //     const formData = new FormData(document.querySelector('form'));

        //     fetch("{{ route('pendaftaran.store') }}", {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         }
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         if (data.success) {
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Berhasil!',
        //                 text: 'Pendaftaran berhasil dilakukan!',
        //                 timer: 2000,
        //                 showConfirmButton: false
        //             }).then(() => {
        //                 window.location.reload(); 
        //             });
        //         } else {
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Gagal',
        //                 text: data.message || 'Terjadi kesalahan saat pendaftaran.',
        //             });
        //         }
        //     })
        //     .catch(error => {
        //         console.error('Terjadi kesalahan:', error);
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Gagal',
        //             text: 'Terjadi kesalahan saat mengirim data.',
        //         });
        //     });
        // });

        // function submitDaftar(event) {
        //     // Jika tombol dinonaktifkan, tidak lakukan apapun
        //     if (event.target.classList.contains('cursor-not-allowed')) {
        //         event.preventDefault(); // Mencegah submit jika tombol dinonaktifkan
        //         return;
        //     }

        //     // Mencegah pengiriman form secara default
        //     event.preventDefault();

        //     // Menentukan tanggal sekarang dan memasukkan ke input tersembunyi
        //     const tanggal = new Date().toLocaleDateString('id-ID'); 
        //     document.getElementById('tanggal_daftar').value = tanggal;

        //     // Mengambil data form
        //     const formData = new FormData(document.querySelector('form'));

        //     // Kirim data form menggunakan Fetch API
        //     fetch("{{ route('pendaftaran.store') }}", {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         }
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         if (data.success) {
        //             // Jika sukses, tampilkan pop-up sukses
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'Berhasil!',
        //                 text: 'Pendaftaran berhasil dilakukan!',
        //                 timer: 2000,
        //                 showConfirmButton: false
        //             }).then(() => {
        //                 window.location.reload(); // Atau bisa form.reset() jika ingin reset form
        //             });
        //         } else {
        //             // Jika gagal, tampilkan pesan error
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'Gagal',
        //                 text: data.message || 'Terjadi kesalahan saat pendaftaran.',
        //             });
        //         }
        //     })
        //     .catch(error => {
        //         console.error('Terjadi kesalahan:', error);
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Gagal',
        //             text: 'Terjadi kesalahan saat mengirim data.',
        //         });
        //     });
        // }

    //     document.querySelector('form').addEventListener('submit', function(e) {
    //     e.preventDefault(); 

    //     const formData = new FormData(this);

    //     fetch(this.action, {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.success) {
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Berhasil',
    //                 text: data.message,
    //                 timer: 1500,
    //                 showConfirmButton: false
    //             });
    //         } else {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Gagal',
    //                 text: data.message,
    //                 timer: 1500,
    //                 showConfirmButton: false
    //             });
    //         }
    //     })
    //     .catch(error => {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Gagal',
    //             text: 'Terjadi kesalahan, coba lagi nanti.',
    //             timer: 1500,
    //             showConfirmButton: false
    //         });
    //     });
    // });
    </script>
</body>
</html>
