{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Pendaftaran Pengguna</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="fullname">Nama Lengkap:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Konfirmasi Kata Sandi:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Alamat:</label>
                <textarea id="address" name="address" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Daftar</button>
            </div>
        </form>
    </div>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        @include('layouts.sidebard')
        <div class="flex-1 p-6 overflow-y-auto">
            <h1 class="text-2xl font-bold mb-8">Penilaian</h1>

            <form action="{{ route('login') }}" method="POST" class="max-w-full space-y-6">
                @csrf
                
                <div class="mt-4 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="overflow-x-auto w-full">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <label class="text-sm font-medium text-gray-700 w-24">Nama</label>
                            Alana
                        </div>
    
                        <div class="flex items-center space-x-4">
                            <label class="text-sm font-medium text-gray-700 w-24">NIM/NISN</label>
                            12345678
                        </div>
                    </div>

                    <table class="mt-4 w-full table-auto border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-blue-900 text-white">
                                <th class="border px-4 py-2 text-left">No</th>
                                <th class="border px-4 py-2 text-left">Parameter Penilaian</th>
                                <th class="border px-4 py-2">Bobot</th>
                                <th class="border px-4 py-2">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd:bg-gray-100 even:bg-gray-200">
                                <td class="border px-4 py-2">1</td>
                                <td class="border px-6 py-2">Electrical Machines</td>
                                <td class="border px-4 py-2 text-center">EM12</td>
                                <td class="border px-4 py-2">
                                    <input type="number" name="courses[0][nilai]" value="5" 
                                           class="w-24 border-gray-300 rounded-md text-center">
                                </td>
                            </tr>
                            <tr class="odd:bg-gray-100 even:bg-gray-200">
                                <td class="border px-4 py-2">2</td>
                                <td class="border px-6 py-2">Electrical Machines</td>
                                <td class="border px-4 py-2 text-center">EM12</td>
                                <td class="border px-4 py-2 flex items-center justify-center">
                                    <input type="number" name="courses[0][nilai]" value="5" 
                                           class="w-full border-gray-300 rounded-md text-center">
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="bg-yellow-100">
                                <td colspan="2" class="border px-4 py-2 font-semibold">Total Course Unit</td>
                                <td class="border px-4 py-2 text-center">100</td>
                                <td class="border px-4 py-2 text-center">22</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>               
            </form>
        </div>
    </div>
</body>
</html>