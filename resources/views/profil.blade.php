@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="container mx-auto flex items-center justify-between py-30">
        <div class="banner">
            <div class="overlay"></div>
            <div class="banner-text">
                <h1>Profil</h1>
                <p>Dinas Komunikasi, Informatika, Statistik dan Persandian (Diskominfo) Kota Semarang</p>
            </div> 
        </div>
    </div>

    <section class="profile-section">
        <div class="profile-content">
            <div class="profile-text">
                <h2>Profil Diskominfo Kota Semarang</h2>
                <p>Berdasarkan Peraturan Walikota Nomor 76 Tahun 2016, Dinas Komunikasi, Informatika, Statistik dan Persandian Kota Semarang atau disebut Diskominfo Kota Semarang merupakan unsur pelaksana urusan pemerintahan yang dipimpin oleh seorang Kepala Dinas dan ditugaskan membantu Walikota Semarang melaksanakan urusan pemerintahan dalam bidang Komunikasi, Informatika, Statistik Dan Persandian yang menjadi kewenangan daerah dan tugas pembantuan yang ditugaskan kepada daerah.</p>
                <br><p>Tugas pembantuan Diskominfo yang dimaksudkan diatas adalah
                    penugasan dari Pemerintah Pusat kepada Daerah, untuk melaksanakan
                    sebagian urusan pemerintahan, yang menjadi kewenangan Pemerintah Pusat
                    atau dari Pemerintah Daerah Provinsi kepada Daerah, untuk melaksanakan
                    sebagian urusan pemerintahan yang menjadi kewenangan Daerah Provinsi.</p></br>
            </div> 
        </div>
        <div class="profile-image owl-carousel">
            <img src="img/kegiatan1.jpeg">
            <img src="img/kegiatan2.jpeg">
            <img src="img/kegiatan3.jpeg">
        </div>
        <div class="profile-content">
            <div class="profile-text">
                <h2>Tugas dan Fungsi</h2>
                <h1>Tugas:
                <br>Kepala DISKOMINFO mempunyai tugas membantu Walikota dalam
melaksanakan urusan pemerintahan Bidang Komunikasi dan Informatika, Bidang
Statistik, dan Bidang Persandian yang menjadi kewenangan daerah dan tugas
pembantuan yang ditugaskan kepada daerah.</br>

                <h1>
                
            </div> 
        </div>
    </section>

    <style>
        .banner {
            position: relative;
            width: 100%;
            height: 300px;
            background: url('img/bangunan.png') center/cover no-repeat;
            display: flex;
            align-items: center;
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
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
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
            max-width: 70%;
            line-height: 1.5;
        }

        .profile-section {
            padding: 50px 10%;
            background-color: #f8f9fa;
        }

        .profile-content {
            display: flex;
            align-items: center;
            gap: 40px;
            max-width: 1200px;
            width: 100%;
        }

        .profile-text {
            flex: 1;
        }

        .profile-text h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #022539;
        }

        .profile-text p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #444;
        }

        .profile-image {
            flex: 1;
            display: flex;
            justify-content: center;
            max-width: 800px; /* Sesuaikan lebar slider */
            margin: auto; /* Biar ada di tengah */
            overflow: hidden;
        }

        .profile-image img {
            max-width: 100%;
            height: 300px; /* Sesuaikan tinggi */
            object-fit: cover; /* Biar proporsional */
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <!-- Tambahin Owl Carousel CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
    $(document).ready(function(){
        $(".profile-image").owlCarousel({
            loop: true, /* Biar muter terus */
            margin: 10,
            nav: false, /* Tombol next/prev, ubah ke true kalau mau */
            dots: true, /* Titik navigasi */
            autoplay: true, /* Biar jalan otomatis */
            autoplayTimeout: 3000, /* Durasi tiap slide */
            autoplayHoverPause: true, /* Berhenti saat hover */
            items: 1 /* 1 gambar per slide */
        });
    });
    </script>

@endsection