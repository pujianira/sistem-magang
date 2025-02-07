<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pendaftar</title>
    <!-- Link ke Google Fonts untuk font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease, color 0.3s ease; 
        }

        .hover-effect:hover {
            transform: scale(1.05); 
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); 
        }

        .hover-effect:hover p {
            color: #FB991A; 
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('layouts.sidebard')

        <!-- Konten Utama -->
        <div class="flex-1 p-6 overflow-y-auto">
            <div class="relative mb-6">
                <img src="{{ asset('img/orangwelcome.png') }}" alt="Illustration of a person waving" class="absolute -top-12 right-0 w-60 h-40">
                <div class="bg-gradient-to-t from-[#1B7691] to-[#10BCEF] text-white p-10 rounded-md flex items-center mb-6 mt-8">
                    <h2 class="text-2xl font-bold">Selamat datang, {{ $namaPendaftar }}!</h2>
                </div>
            </div>
            <!-- Kotak-Kotak Informasi -->
            <div class="grid grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-md shadow-lg text-center">
                    <h3 class="text-lg font-bold mb-2">Status Pendaftaran</h3>
                    <p class="text-2xl font-bold">{{ $statusPendaftaran }}</p>
                </div>
                <div class="bg-white p-6 rounded-md shadow-lg text-center">
                    <h3 class="text-lg font-bold mb-2">Status Kelulusan</h3>
                    <p class="text-2xl font-bold">{{ $statusKelulusan }}</p>
                </div>
            </div>

            @if ($statusPendaftaran != 'Belum Mendaftar')
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gray-100 p-6 rounded-md">
                        <h3 class="text-lg font-bold mb-4">Durasi Magang</h3>
                        {{-- <div class="relative w-32 h-32 mx-auto">
                            <img src="https://placehold.co/100x100" alt="Pie chart showing 30% and 70%" class="w-full h-full">
                        </div> --}}
                        <div>
                            {{-- <object data="{{ Storage::url($pendaftar->surat_permohonan) }}" type="application/pdf" width="100%" height="500px">
                                <p>File PDF tidak dapat ditampilkan. Silakan <a href="{{ Storage::url($pendaftar->surat_permohonan) }}" target="_blank">unduh PDF</a> untuk melihatnya.</p>
                            </object> --}}
                            {{-- <a href="{{ asset('storage/' . $pendaftar->surat_permohonan) }}" target="_blank">Lihat Surat Permohonan</a>
                            <iframe src="{{ asset('storage/' . $pendaftar->surat_permohonan) }}" width="100%" height="600px"></iframe> --}}
                            {{-- <a href="{{ route('view-file', ['filename' => basename($pendaftar->surat_permohonan)]) }}" target="_blank">Lihat Surat Permohonan</a> --}}
                            {{-- <a href="{{ route('view-file', ['filename' => 'surat_permohonan_' . $user->nama . '_' . $pendaftar->nim_nisn . '.pdf']) }}" target="_blank">
                                Lihat Surat Permohonan
                            </a>      
                            <a href="{{ route('view-file', ['filename' => 'proposal_' . $user->nama . '_' . $pendaftar->nim_nisn . '.pdf']) }}" target="_blank">
                                Lihat Proposal
                            </a> 
                            <a href="{{ route('view-file', ['filename' => 'foto_' . $user->nama . '_' . $pendaftar->nim_nisn . '.jpg']) }}" target="_blank">
                                Lihat Proposal
                            </a>  
                            <iframe src="{{ route('view-file', ['filename' => 'cv_' . $user->nama . '_' . $pendaftar->nim_nisn . '.pdf']) }}" width="100%" height="600px"></iframe>
                            <iframe src="{{ route('view-file', ['filename' => 'foto_' . $user->nama . '_' . $pendaftar->nim_nisn . '.jpg']) }}" width="100%" height="600px"></iframe> --}}

                                                  
                            {{-- <a href="{{ route('view-file', ['nim_nisn' => $pendaftar->nim_nisn, 'file_type' => 'cv']) }}" target="_blank">
                                Lihat CV
                            </a> --}}
                            {{-- <a href="{{ route('view-file', ['nim_nisn' => $pendaftar->nim_nisn, 'file_type' => 'cv']) }}" target="_blank">
                                Lihat CV
                            </a> --}}
                            {{-- <a href="{{ route('view-file', ['file_type' => 'cv', 'nim_nisn' => $pendaftar->nim_nisn]) }}" target="_blank">
                                Lihat CV {{ $pendaftar->nama }}
                            </a>                             --}}
                            {{-- \Log::info('File Path: ' . $suratPath);
                            \Log::info('File Exists: ' . file_exists(storage_path('app/' . $suratPath))); --}}
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-md shadow-md">
                        <h3 class="text-lg font-bold mb-4 text-center">Detail Magang</h3>
                        <p class="mb-4">Bidang Magang: </p>
                        <p class="mb-4">Mentor: </p>
                        <p class="mb-4">Pembina: </p>
                        <div class="flex justify-center mt-6">
                            <button class="bg-[#FB991A] text-white px-40 py-2 rounded-md hover:bg-orange-600 transition duration-300">Nilai</button>
                        </div>
                    </div>
                </div>
            @else 
                <div class="bg-gray-100 p-6 rounded-md">
                    <h3 class="text-lg font-bold mb-4 text-center">Bidang Magang Diskominfo</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <div class="bg-white p-6 rounded shadow text-center hover-effect">
                        <a href="{{ route('daftarmagang') }}">
                            <p>Teknologi Informasi dan Komunikasi</p>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center flex justify-center items-center hover-effect">
                        <a href="/statistik">
                            <p>Statistik</p>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center hover-effect">
                        <a href="/informasi-dan-komunikasi-publik">
                            <p>Informasi dan Komunikasi Publik</p>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center flex justify-center items-center hover-effect">
                        <a href="/e-government">
                            <p>E-Government</p>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center hover-effect">
                        <a href="/persandian-dan-keamanan-informasi">
                            <p>Persandian dan Keamanan Informasi</p>
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded shadow text-center flex justify-center items-center hover-effect">
                        <a href="/sekretariat">
                            <p>Sekretariat</p>
                        </a>
                    </div>
                </div>            
            @endif
            <!-- <footer class="footer fixed-bottom bg-[#022539] text-white py-4 text-center text-sm mt-8">
                &copy; 2025 Diskominfo Semarang. All Rights Reserved.
            </footer> -->
        </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>