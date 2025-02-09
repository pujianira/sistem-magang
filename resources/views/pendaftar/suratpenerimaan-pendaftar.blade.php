{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Penerimaan Magang</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { width: 80%; margin: 0 auto; text-align: center; }
        .header { font-size: 20px; font-weight: bold; margin-bottom: 20px; }
        .content { font-size: 16px; text-align: justify; }
        .signature { margin-top: 50px; text-align: right; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">SURAT PENERIMAAN MAGANG</div>
        <p>No: 001/SPM/{{ date('Y') }}</p>
        <p>Kepada Yth,</p>
        <p><b>{{ $nama }}</b></p>
        <p>NIM: <b>{{ $nim }}</b></p>
        <p>Di bidang: <b>{{ $bidang }}</b></p>
        <p class="content">
            Dengan ini kami menginformasikan bahwa Anda telah diterima untuk menjalani program magang di bidang <b>{{ $bidang }}</b>. 
            Magang akan dimulai pada tanggal yang akan ditentukan oleh pihak institusi.
        </p>
        <p class="signature">
            Semarang, {{ $tanggal }} <br>
            <b>Pembina Magang</b>
        </p>
    </div>
</body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Penerimaan Magang</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 40px; }
        .header { text-align: center; font-size: 20px; font-weight: bold; }
        .line { border-top: 2px solid black; margin: 10px 0; }
        .content { font-size: 16px; text-align: justify; }
        .signature { margin-top: 50px; text-align: right; }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="15%">
                <img src="{{ asset('storage/logo.png') }}" width="100%">
            </td>
            <td>
                <div class="header">SURAT PENERIMAAN MAGANG</div>
            </td>
        </tr>
    </table>

    <div class="line"></div>

    {{-- <p>Nomor: 001/SPM/{{ date('Y') }}</p>
    <p>Lampiran: -</p>
    <p>Perihal: Penerimaan Magang</p>

    <p style="text-align: right;">Semarang, {{ $tanggal }}</p> 
    <table style="width: 100%;">
        <tr>
            <td>Nomor: 001/SPM/{{ date('Y') }}</td>
            <td style="text-align: right;">Semarang, {{ $tanggal }}</td>
        </tr>
    </table>
    <p>Lampiran: -</p>
    <p>Perihal: Penerimaan Magang</p>

    <p>Kepada: </p>
    <p>Yth, Dekan Akademik dan Kemahasiswaan</p>
    <p>{{ $universitas_sekolah }}</p>

    Dengan ini, kami menyatakan bahwa ananda atas nama

    <p><b>{{ $nama }}</b></p>
    <p>NIM: <b>{{ $nim }}</b></p>
    <p>Di bidang: <b>{{ $bidang }}</b></p>

    <p class="content">
        Dengan ini kami menginformasikan bahwa Anda telah diterima untuk menjalani program magang di bidang <b>{{ $bidang }}</b>. 
        Magang akan dimulai pada tanggal yang akan ditentukan oleh pihak institusi.
    </p>

    <p class="signature">
        <b>Pembina Magang</b>
    </p>
</body>
</html> --}}

{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Penerimaan Magang</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 40px; }
        .header { text-align: center; font-size: 20px; font-weight: bold; }
        .line { border-top: 2px solid black; margin: 10px 0; }
        .content { font-size: 16px; text-align: justify; }
        .signature { margin-top: 50px; text-align: right; }
        .info-table { width: 100%; margin-bottom: 15px; }
        .info-table td { vertical-align: top; padding: 5px 10px; }
        .recipient { margin-top: 20px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="15%">
                <img src="{{ public_path('storage/logo.png') }}" width="100%">
            </td>
            <td>
                <div class="header">PEMERINTAH KOTA SEMARANG</div>
                <div class="header">DINAS KOMUNIKASI, INFORMATIKA, STATISTIK</div>
                <div class="header">DAN PERSANDIAN</div>
                <div class="header">Jl. Pemuda 148 Telp. (024)3549446 Fax. (024)3549446 Semarang 50132</div>
            </td>
        </tr>
    </table>

    <div class="line"></div>

    <table class="info-table">
        <tr>
            <td>Nomor</td>
            <td>: 001/SPM/{{ date('Y') }}</td>
            <td style="text-align: right;">Semarang, {{ $tanggal }}</td>
        </tr>
        <tr>
            <td>Lampiran</td>
            <td>: -</td>
            <td></td>
        </tr>
        <tr>
            <td>Perihal</td>
            <td>: Penerimaan Magang</td>
            <td></td>
        </tr>
    </table>

    <div class="recipient">
        <p>Kepada:</p>
        <p>Yth, Dekan Akademik dan Kemahasiswaan</p>
        <p>{{ $universitas_sekolah }}</p>
    </div>

    <p>Dengan ini, kami menyatakan bahwa ananda atas nama:</p>

    <p>Nama: <b>{{ $nama }}</b></p>
    <p>NIM: <b>{{ $nim }}</b></p>
    <p>Bidang: <b>{{ $bidang }}</b></p>

    <p class="content">
        Dengan ini kami menginformasikan bahwa ananda telah diterima untuk menjalani program magang di bidang <b>{{ $bidang }}</b>. 
        Magang akan dimulai pada {{ $bulan_mulai }} {{ $tahun_mulai }} di Dinas Komunikasi, Informatika, Statistik, dan Persandian Kota Semarang.
    </p>

    <p class="signature">
        <b>Pembina Magang</b>
    </p>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Penerimaan Magang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 40px;
        }
        .header {
            text-align: center;
            font-weight: bold;
        }
        .header .big {
            font-size: 22px;
        }
        .header .medium {
            font-size: 18px;
        }
        .header .small {
            font-size: 14px;
        }
        .line {
            border-top: 2px solid black;
            margin: 10px 0;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .info-table td {
            padding: 5px 10px;
            vertical-align: top;
        }
        .info-table td:first-child {
            width: 15%;
            font-weight: bold;
        }
        .recipient {
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .info-data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .info-data td {
            padding: 5px 10px;
            vertical-align: top;
        }
        .info-data td:first-child {
            width: 20%; /* Label rata kiri */
            font-weight: bold;
        }
        .info-data td:last-child {
            text-align: justify; /* Menjaga rapi */
        }
        .content {
            font-size: 16px;
            text-align: justify;
            margin-top: 20px;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>
<body>

    <!-- Header Surat -->
    <table width="100%">
        <tr>
            <td width="20%">
                <img src="{{ public_path('storage/logo.png') }}" width="120%"> <!-- Perbesar Logo -->
            </td>
            <td style="text-align: center;">
                <div class="header">
                    <div class="small">PEMERINTAH KOTA SEMARANG</div>
                    <div class="big" style="font-size: 18px;">DINAS KOMUNIKASI, INFORMATIKA, STATISTIK</div>
                    <div class="big" style="font-size: 18px;">DAN PERSANDIAN</div>
                    <div class="small">Jl. Pemuda 148 Telp. (024)3549446 Fax. (024)3549446 Semarang 50132</div>
                </div>
            </td>
        </tr>
    </table>

    <div class="line"></div>

    <!-- Informasi Surat -->
    <table class="info-table" width="100%" style="margin-left: -10px;">
        <tr>
            <td width="15%"><b>Nomor</b></td>
            <td width="60%">: 001/SPM/{{ date('Y') }}</td>
            <td width="60%" style="text-align: right;">Semarang, {{ $tanggal }}</td>
        </tr>
        <tr>
            <td><b>Lampiran</b></td>
            <td>: -</td>
            <td></td>
        </tr>
        <tr>
            <td><b>Perihal</b></td>
            <td>: Penerimaan Magang</td>
            <td></td>
        </tr>
    </table>

    <!-- Kepada Yth -->
    <div class="recipient">
        <p>Kepada:</p>
        <p>Yth, Dekan Akademik dan Kemahasiswaan</p>
        <p>{{ $universitas_sekolah }}</p>
    </div>

    <p>Ananda atas nama:</p>

    <!-- Data Pendaftar -->
    <table class="info-data">
        <tr>
            <td>Nama</td>
            <td>: <b>{{ $nama }}</b></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>: <b>{{ $nim }}</b></td>
        </tr>
        <tr>
            <td>Bidang</td>
            <td>: <b>{{ $bidang }}</b></td>
        </tr>
    </table>

    <!-- Isi Surat -->
    <p class="content">
        Dengan ini, kami menginformasikan bahwa ananda telah diterima untuk menjalani program magang di bidang 
        <b>{{ $bidang }}</b>. Magang akan dimulai pada {{ $bulan_mulai }} {{ $tahun_mulai }} 
        di Dinas Komunikasi, Informatika, Statistik, dan Persandian Kota Semarang.
    </p>

    <!-- Tanda Tangan -->
    <p class="signature">
        <b>Pembina Magang</b>
    </p>

</body>
</html>


