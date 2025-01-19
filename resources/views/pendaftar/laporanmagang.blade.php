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

                <!-- Form Content -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form Fields -->
                        <div class="w-full mx-auto space-y-6">
                            <!-- Judul -->
                            <div>
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="judul">Judul</label>
                                <input type="text" id="judul" name="judul" required
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
                                <label class="block text-sm font-medium text-gray-800 mb-1" for="alamat">Deskripsi Karya</label>
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
                            <!-- <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Submit
                                </button>
                            </div> -->

                            <div class="flex justify-end">
                                <button class="bg-[#FB991A] text-white px-40 py-2 rounded-md hover:bg-orange-600 transition duration-300 font-bold">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
