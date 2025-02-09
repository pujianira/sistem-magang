@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <div class="container mx-auto flex items-center justify-between py-30">
        <div class="banner">
            <div class="overlay"></div>
            <div class="banner-text">
                <h1>Selamat Datang</h1>
                <p>Sistem Informasi Magang Dinas Komunikasi, Informatika, Statistik dan Persandian (Diskominfo) Kota Semarang</p>
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
                        <h4>Sistem Pemerintahan Berbasis Elektronik</h4>
                        <p>- Keamanan Informasi dan Persandian<br>- Pengembangan Aplikasi<br>- Tata Kelola Teknologi Informasi</p>
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-lock"></i></div>
                        <h4>Pengelolaan Informasi dan Saluran Komunitas</h4>
                        <p>- Pengelolaan Media<br>- Pengelolaan Aspirasi dan Informasi<br>- PPID, Keterbukaan Informasi Publik</p>
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-rss"></i></div>
                        <h4>Bidang Pengelolaan Infrastruktur</h4>
                        <p>- Layanan Infrastruktur, Internet, dan Intranet<br>- Pengelolaan Saluran Informasi<br>- Pengelolaan TIK</p>
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-chart-area"></i></div>
                        <h4>Bidang Statistik</h4>
                        <p>- Statistik Infrastruktur, Tata Ruang, dan Lingkungan<br>- Pengelolaan Statistik Sektoral dan Geospasial</p>
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-bullhorn"></i></div>
                        <h4>Pengembangan Komunikasi Publik</h4>
                        <p>- Penyusunan Strategi dan Pengawasan Komunikasi Publik<br>- Pengembangan SDM Komunitas TIK</p>
                    </div>
                    <div class="service-item">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <h4>Sekretariat</h4>
                        <p>- Sub Bagian Umum dan Kepegawaian<br>- Sub Bagian Keuangan dan Barang Milik Daerah</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="requirements">
            <div class="requirements-heading text-center mb-4">
                <h2>Berkas yang Perlu Dipersiapkan</h2>
            </div>
            <div class="requirements-container">
                <div class="requirement-item">
                    <div class="requirement-image">
                        <img src="{{ asset('img/surat.png') }}" alt="Surat Permohonan">
                    </div>
                    <div class="requirement-content">
                        <h4>Surat Permohonan</h4>
                        <p>Surat Permohonan izin magang dari universitas/sekolah, berisi:
                            <br>a. Nama dan NIM
                            <br>b. Jurusan dan Fakultas/Sekolah
                            <br>c. Durasi Magang
                            <br>d. Rencana jadwal magang
                        </p>
                    </div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-image">
                        <img src="{{ asset('img/proposal.png') }}" alt="Proposal">
                    </div>
                    <div class="requirement-content">
                        <h4>Proposal</h4>
                        <p>
                            - Latar belakang magang
                            <br>- Maksud dan tujuan magang
                            <br>- Rencana dan durasi magang
                            <br>- Kompetensi yang dimiliki mahasiswa
                            <br>- Surat pernyataan bersedia mengikuti
                            <br>- Surat pernyataan bersedia membuat laporan magang setiap minggu
                        </p>
                    </div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-image">
                        <img src="{{ asset('img/cv.png') }}" alt="Creative CV">
                    </div>
                    <div class="requirement-content">
                        <h4>Creative CV</h4>
                        <p>
                            - Nama, NIM, foto terbaru
                            <br>- Tempat, tanggal lahir
                            <br>- Alamat, email dan no. telepon aktif
                            <br>- Jurusan, fakultas, univ/sekolah
                            <br>- Sejarah pendidikan
                            <br>- Hobi dan minat
                            <br>- Kompetensi yang dimiliki saat ini
                            <br>- Diklat, seminar, workshop yang diikuti
                            <br>- Organisasi yang pernah/sedang diikuti
                        </p>
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
            min-height: 350px; 
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; 
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
            font-weight: bold;
            color: #022539;
        }

        .services h4 {
            font-size: 1.2rem;
            font-weight: 700;
            font-weight: bold;
            color: #022539;
        }

        .services p {
            font-size: 1rem;
            font-weight: 100;
            color: #022539;
            text-align: left;
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

        .requirements-heading h2 {
            font-size: 2.5rem;
            color: #022539;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .requirements-container {
            display: flex;
            justify-content: space-between;
            overflow-x: auto; /* Memungkinkan scroll horizontal jika layar sempit */
            gap: 20px; /* Jarak antar item */
            padding-bottom: 20px; /* Ruang untuk scrollbar */
        }

        .requirement-item {
            flex: 0 0 calc(33.333% - 20px); /* Lebar item dengan margin */
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            min-width: 300px; /* Lebar minimum item */
        }

        .requirement-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .requirement-image {
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            overflow: hidden;
            width: 50%; /* Kurangi lebar */
            margin: 0 auto; /* Pusatkan */
            position: relative;
            top: 10px; /* Sedikit turunkan */
        }

        .requirement-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
        }

        .requirement-content {
            padding: 20px;
        }

        .requirement-content h4 {
            color: #022539;
            margin-bottom: 15px;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .requirement-content p {
            color: #666;
            line-height: 1.6;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .requirements-container {
                flex-wrap: nowrap;
                overflow-x: scroll;
                -webkit-overflow-scrolling: touch; /* Smooth scrolling pada iOS */
            }

            .requirement-item {
                flex: 0 0 80%; /* Item lebih lebar pada layar kecil */
            }
        }
 
    </style>
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