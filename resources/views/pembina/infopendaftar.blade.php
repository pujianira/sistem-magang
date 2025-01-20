<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Pendaftar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
                                <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->nama }}</p>
                            </div>
                        </div>
                        <div class="p-3 rounded-md mb-1">
                            <div class="flex items-center">
                                <h4 class="text-base font-medium text-gray-500 w-1/3">Tempat / Tanggal Lahir</h4>
                                <p class="text-md text-gray-800 w-2/3">{{ $pendaftar->tempat_lahir }} / {{ \Carbon\Carbon::parse($pendaftar->ttl)->format('d-m-Y') }}
                                </p>
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
                    <div class="flex mt-10 justify-end">
                    @if ($pendaftar->status_pendaftaran == 'Pending')
                        <button class="bg-green-500 text-white py-2 px-6 rounded-full mr-4" 
                                onclick="showConfirmationModal('approve')" 
                                id="approveButton">
                            Setujui Pengajuan
                        </button>
                        <button class="bg-red-500 text-white py-2 px-6 rounded-full" 
                                onclick="showConfirmationModal('reject')" 
                                id="rejectButton">
                            Tolak Pengajuan
                        </button>
                    @else
                        <button class="bg-green-500 text-white py-2 px-6 rounded-full mr-4 opacity-50">
                            Setujui Pengajuan
                        </button>
                        <button class="bg-red-500 text-white py-2 px-6 rounded-full opacity-50">
                            Tolak Pengajuan
                        </button>
                    @endif
                </div>

                <!-- Modal Confirmation -->
                <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3 text-center">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle"></h3>
                            <div class="mt-2 px-7 py-3">
                                <p class="text-sm text-gray-500" id="modalMessage"></p>
                            </div>
                            <div class="items-center px-4 py-3">
                                <form id="approvalForm" method="POST">
                                    @csrf
                                    <button id="confirmButton" 
                                            class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                        Konfirmasi
                                    </button>
                                    <button type="button" 
                                            onclick="hideConfirmationModal()" 
                                            class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                        Batal
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                function showConfirmationModal(action) {
                    const modal = document.getElementById('confirmationModal');
                    const modalTitle = document.getElementById('modalTitle');
                    const modalMessage = document.getElementById('modalMessage');
                    const form = document.getElementById('approvalForm');
                    const confirmButton = document.getElementById('confirmButton');
                    
                    if (action === 'approve') {
                        modalTitle.textContent = 'Konfirmasi Persetujuan';
                        modalMessage.textContent = 'Apakah Anda yakin ingin menyetujui pengajuan magang ini?';
                        form.action = "{{ route('setujui.pendaftaran', $pendaftar->nim_nisn) }}";
                        confirmButton.className = 'px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300';
                    } else if (action === 'reject') {
                        modalTitle.textContent = 'Konfirmasi Penolakan';
                        modalMessage.textContent = 'Apakah Anda yakin ingin menolak pengajuan magang ini?';
                        form.action = "{{ route('tolak.pendaftaran', $pendaftar->nim_nisn) }}";
                        confirmButton.className = 'px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300';
                    }
                    
                    modal.classList.remove('hidden');
                }

                function hideConfirmationModal() {
                    const modal = document.getElementById('confirmationModal');
                    modal.classList.add('hidden');
                }

                // Close modal when clicking outside
                window.onclick = function(event) {
                    const modal = document.getElementById('confirmationModal');
                    if (event.target == modal) {
                        hideConfirmationModal();
                    }
                }
                </script>
                </div>
            </div>
        </div>
    </div>
</body>
