@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <div class="container mx-auto flex items-center justify-between py-30">
        <div class="banner">
            <div class="overlay"></div>
            <div class="banner-text">
                <h1>Selamat Datang</h1>
                <p>Sistem Informasi Pendaftaran Magang Dinas Komunikasi, Informatika, Statistik dan Persandian (Diskominfo) Kota Semarang</p>
            </div> 
        </div>
    </div>
    
    <section class="about-section">
        <div class="about-content">
            <div class="about-text">
                <h2>Tentang Diskominfo Kota Semarang</h2>
                <p>Berdasarkan Peraturan Walikota Nomor 76 Tahun 2016, Dinas Komunikasi, Informatika, Statistik dan Persandian Kota Semarang atau disebut Diskominfo Kota Semarang merupakan unsur pelaksana urusan pemerintahan yang dipimpin oleh seorang Kepala Dinas dan ditugaskan membantu Walikota Semarang melaksanakan urusan pemerintahan dalam bidang Komunikasi, Informatika, Statistik Dan Persandian yang menjadi kewenangan daerah dan tugas pembantuan yang ditugaskan kepada daerah.</p>
            </div> 
            <div class="about-image">
                <img src="img/bangunan.png" alt="Gambar Instansi">
            </div>
        </div>

        <div class="services">
            <div class="section-heading text-center mb-4">
                <h2>Bidang yang Dimagangkan</h2>
            </div>
            <div class="container">
                <div class="owl-carousel owl-theme">
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-university"></i></div>
                        <h4>E-Government</h4>
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-lock"></i></div>
                        <h4>Persandian & Keamanan</h4>
                        <!-- <p>- Arsitektur Keamanan Informasi<br>- Manajemen Risiko</p> -->
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-rss"></i></div>
                        <h4>Teknologi Informasi</h4>
                        <!-- <p>- Monitoring Jaringan<br>- Instalasi Kabel LAN</p> -->
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-chart-area"></i></div>
                        <h4>Statistik</h4>
                        <!-- <p>- Survei Kepuasan Masyarakat<br>- Pengelolaan Data Geospasial</p> -->
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-bullhorn"></i></div>
                        <h4>Informasi & Komunikasi Publik</h4>
                        <!-- <p>- Monitoring Media<br>- Manajemen Kehumasan</p> -->
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <h4>Sekretariat</h4>
                        <!-- <p>- Kepegawaian & Jabatan Fungsional<br>- Keterbukaan Informasi Publik</p> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .banner {
            position: relative;
            width: 100%;
            height: 300px;
            background: url('img/buku.png') center/cover no-repeat;
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

        .about-section {
            padding: 50px 10%;
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

        .about-image {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .about-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .services {
            padding: 50px 50px;
            /* background: url('img/classroom.jpg') center/cover no-repeat; */
        }

        .services .owl-carousel {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .service-item {
            background: white;
            border-radius: 10px;
            padding: 30px;
            margin: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .service-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .service-item .icon i {
            font-size: 40px;
            color: #FFA500;
            margin-bottom: 15px;
        }

        .service-item h4 {
            margin-bottom: 15px;
            color: #022539;
        }

        .services h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #022539;
        }


        .owl-carousel .owl-nav {
            display: none;
        }

        .owl-dots {
            text-align: center;
            margin-top: 20px;
        }

        .owl-dot span {
            width: 12px;
            height: 12px;
            background: #022539;
            display: inline-block;
            border-radius: 50%;
            margin: 5px;
            opacity: 0.5;
        }

        .owl-dot.active span {
            opacity: 1;
        }
    </style>

    <!-- Include necessary libraries -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: true,
            responsive: {
                0: { items: 1 },
                600: { items: 2 },
                1000: { items: 3 }
            },
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true
        });
    });
    </script>

@endsection