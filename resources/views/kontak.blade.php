@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <div class="container mx-auto flex items-center justify-between py-30">
        <div class="banner relative w-full h-72 bg-cover bg-center flex items-center justify-center text-white text-center" style="background-image: url('/img/buku.png');">
            <div class="overlay absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="banner-text relative z-10">
                <h1 class="text-4xl font-bold uppercase">Kontak</h1>
                <p class="text-lg">Magang Diskominfo Kota Semarang</p>
            </div>
        </div>
    </div>
    <section class="about-section py-16 bg-gray-100 flex flex-col items-center">
        <div class="about-content max-w-4xl w-full flex flex-col md:flex-row gap-10">
            <div class="about-text flex-1">
                <h2 class="text-3xl font-bold text-blue-900 mb-4">Kami Siap Membantu</h2>
                <p class="text-lg text-gray-700 leading-relaxed">Hubungi kami untuk informasi lebih lanjut atau pertanyaan terkait informasi magang Diskominfo Kota Semarang. Tim kami siap memberikan bantuan yang Anda butuhkan.</p>
                
                <div class="list-social flex gap-4 mt-6">
                    <a class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white" href="https://www.facebook.com/diskominfokotasemarang/" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="w-10 h-10 flex items-center justify-center rounded-full bg-pink-500 text-white" href="https://www.instagram.com/diskominfokotasemarang" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-400 text-white" href="https://twitter.com/kominfokotasmg" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="w-10 h-10 flex items-center justify-center rounded-full bg-red-600 text-white" href="https://www.youtube.com/@semarangpemkot" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                
                <div class="list-more-infor mt-6 space-y-4">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-envelope text-orange-500 text-xl"></i>
                        <span class="text-lg font-medium text-gray-700">diskominfo@semarangkota.go.id</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-map-marker-alt text-orange-500 text-xl"></i>
                        <span class="text-lg font-medium text-gray-700">Jl. Pemuda No.148, Kota Semarang, Jawa Tengah 50132</span>
                    </div>
                </div>
            </div>
            
            <div class="map-container flex-1">
                <iframe class="rounded-lg shadow-lg w-full h-64 md:h-80" 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15840.793492617235!2d110.4142924!3d-6.98589825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4fd277d06b%3A0x4056bfa9e8303c06!2sDinas%20Kominfo%20Kota%20Semarang!5e0!3m2!1sid!2sid!4v1721794012651!5m2!1sid!2sid" 
                    allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        .banner {
            position: relative;
            width: 100%;
            height: 300px;
            background: url('img/buku.png') center/cover no-repeat;
            display: flex;
            align-items:center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .banner-text {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .banner-text h1 {
            font-size: 3rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .banner-text p {
            font-size: 1.5rem;
            font-weight: 400;
        }

        .about-section {
            padding: 50px 6%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 40px;
            max-width: 1200px;
            width: 100%;
        }

        .about-text {
            flex: 1;
        }

        .about-text h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #022539;
        }

        .about-text p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #444;
        }

        .map-container {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        iframe {
            width: 100%;
            max-width: 600px;
            height: 450px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <!-- Tambahkan FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
