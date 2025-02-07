<!DOCTYPE html>
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
            Jakarta, {{ $tanggal }} <br>
            <b>Pembina Magang</b>
        </p>
    </div>
</body>
</html>