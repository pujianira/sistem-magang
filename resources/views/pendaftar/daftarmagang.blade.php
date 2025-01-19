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
                    <h1 class="text-xl font-bold">Form Pendaftaran</h1>
                </div>

                <!-- Form Content -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form Fields -->
                        <div class="w-full mx-auto space-y-6">
                            <!-- Foto Profile -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="foto">Foto Profile</label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="foto" name="foto" accept="image/*" required>
                                </div>
                            </div>

                            <!-- Nama -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="nama">Nama</label>
                                <input type="text" id="nama" name="nama" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- Tempat Lahir -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- Agama -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="agama">Agama</label>
                                <select id="agama" name="agama" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">--- Pilih Agama ---</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1">Jenis Kelamin</label>
                                <div class="flex gap-4">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" required
                                            class="form-radio text-blue-500 h-4 w-4">
                                        <span class="ml-2">Laki-laki</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" required
                                            class="form-radio text-blue-500 h-4 w-4">
                                        <span class="ml-2">Perempuan</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="alamat">Alamat Lengkap</label>
                                <textarea id="alamat" name="alamat" required rows="3"
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                            </div>

                            <!-- No HP -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="no_hp">Nomor Telepon</label>
                                <input type="text" id="no_hp" name="no_hp" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- Universitas/Sekolah -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="univ_sekolah">Universitas/Sekolah</label>
                                <input type="text" id="univ_sekolah" name="univ_sekolah" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- NIM/NISN -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="nim_nisn">NIM/NISN</label>
                                <input type="text" id="nim_nisn" name="nim_nisn" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- NIK -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="nik">NIK</label>
                                <input type="text" id="nik" name="nik" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- Jurusan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="jurusan">Jurusan</label>
                                <input type="text" id="jurusan" name="jurusan" required
                                    class="w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <!-- Periode -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="periode">Periode</label>
                                <select id="periode" name="periode" required
                                    class="text-md text-gray-800 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">--- Pilih Periode ---</option>
                                    @foreach($periodes as $periode)
                                        <option value="{{ $periode->bulan }}">{{ $periode->bulan }} {{ $periode->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Bidang -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="bidang">Bidang</label>
                                <select id="bidang" name="bidang" required
                                    class="text-md text-gray-800 w-full border rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">--- Pilih Bidang ---</option>
                                    @foreach($bidangs as $bidang)
                                        <option value="{{ $bidang->id_bidang }}">{{ $bidang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Surat Permohonan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="surat">Surat Permohonan</label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="surat" name="surat" accept=".pdf,.doc,.docx" required>
                                </div>
                            </div>

                            <!-- Proposal -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="proposal">Proposal</label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="proposal" name="proposal" accept=".pdf,.doc,.docx" required>
                                </div>
                            </div>

                            <!-- CV -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="cv">Curriculum Vitae</label>
                                <div class="file-input-wrapper">
                                    <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
                                </div>
                            </div>

                            <!-- Submit -->
                            <!-- <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Submit
                                </button>
                            </div> -->

                            <div class="flex justify-end">
                                <button class="bg-[#FB991A] text-white px-40 py-2 rounded-md hover:bg-orange-600 transition duration-300 font-bold">Daftar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
