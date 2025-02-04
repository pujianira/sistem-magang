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
            <div class="card">
                <p>Berdasarkan Peraturan Walikota Nomor 76 Tahun 2016, Dinas Komunikasi, Informatika, Statistik dan Persandian Kota Semarang atau disebut Diskominfo Kota Semarang merupakan unsur pelaksana urusan pemerintahan yang dipimpin oleh seorang Kepala Dinas dan ditugaskan membantu Walikota Semarang melaksanakan urusan pemerintahan dalam bidang Komunikasi, Informatika, Statistik Dan Persandian yang menjadi kewenangan daerah dan tugas pembantuan yang ditugaskan kepada daerah.</p>
                <br>
                <p>Tugas pembantuan Diskominfo yang dimaksudkan diatas adalah
                    penugasan dari Pemerintah Pusat kepada Daerah, untuk melaksanakan
                    sebagian urusan pemerintahan, yang menjadi kewenangan Pemerintah Pusat
                    atau dari Pemerintah Daerah Provinsi kepada Daerah, untuk melaksanakan
                    sebagian urusan pemerintahan yang menjadi kewenangan Daerah Provinsi.</p>
            </div>
        </div>

        <!-- Accordion Sections -->
        <div class="accordion-container">
            <!-- Tugas dan Fungsi -->
            <div class="accordion-item">
                <div class="accordion-header">
                    <!-- <i class="fas fa-tasks icon-header"></i> -->
                    <h2>Tugas dan Fungsi</h2>
                    <i class="fas fa-chevron-down accordion-icon"></i>
                </div>
                <div class="accordion-content">
                    <div class="card">
                        <h3>Tugas:</h3>
                        <p>Kepala DISKOMINFO mempunyai tugas membantu Walikota dalam
                            melaksanakan urusan pemerintahan Bidang Komunikasi dan Informatika, Bidang
                            Statistik, dan Bidang Persandian yang menjadi kewenangan daerah dan tugas
                            pembantuan yang ditugaskan kepada daerah.</p>
                        </p>
                        <h3>Fungsi:</h3>
                        <ol class="numbered-list">
                            <li>Perumusan kebijakan Bidang Pengembangan Komunikasi Publik, Bidang Layanan E-Government, Bidang Pengelolaan Informasi dan Saluran Komunikasi Publik, Bidang Pengelolaan Infrastruktur, dan Bidang Statistik;</li>
                            <li>Perumusan rencana strategis sesuai dengan visi dan misi Walikota;</li>
                            <li>Pengkoordinasian tugas-tugas dalam rangka pelaksanaan program dan kegiatan Kesekretariatan, Bidang Pengembangan Komunikasi Publik, Bidang Layanan E-Government, Bidang Pengelolaan Informasi dan Saluran Komunikasi Publik, Bidang Pengelolaan Infrastruktur, dan Bidang Statistik;</li>
                            <li>Penyelenggaraan pembinaan kepada pegawai dalam lingkup tanggung jawabnya;</li>
                            <li>Penyelenggaraan penyusunan Sasaran Kerja Pegawai;</li>
                            <li>Penyelenggaraan kerjasama Bidang Pengembangan Komunikasi Publik, Bidang Layanan E-Government, Bidang Pengelolaan Informasi dan Saluran Komunikasi Publik, Bidang Pengelolaan Infrastruktur, dan Bidang Statistik;</li>
                            <li>Penyelenggaraan kesekretariatan DISKOMINFO;</li>
                            <li>Penyelenggaraan program dan kegiatan Bidang Pengembangan Komunikasi Publik, Bidang Layanan E-Government, Bidang Pengelolaan Informasi dan Saluran Komunikasi Publik, Bidang Pengelolaan Infrastruktur, dan Bidang Statistik;</li>
                            <li>Penyelenggaraan penilaian kinerja Pegawai;</li>
                            <li>Penyelenggaraan monitoring dan evaluasi program dan kegiatan;</li>
                            <li>Penyelenggaraan laporan pelaksanaan program dan kegiatan;</li>
                            <li>Pelaksanaan fungsi lain yang diberikan oleh Walikota terkait dengan tugas dan fungsinya.</li>
                        </ol>
                        <a href="https://drive.google.com/file/d/1mIAqbNzd9SYp0vXbE_CmnhyEJtKZFoqj/view" 
                            class="button-orange" 
                            target="_blank">
                            Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
            <!-- Visi dan Misi -->
            <div class="accordion-item">
                <div class="accordion-header">
                    <!-- <i class="fas fa-bullseye icon-header"></i> -->
                    <h2>Visi dan Misi</h2>
                    <i class="fas fa-chevron-down accordion-icon"></i>
                </div>
                <div class="accordion-content">
                    <div class="card">
                        <iframe src="https://drive.google.com/file/d/1tYSZ1E8FyAuJY1uahcWgg8ZHLRs3UvrA/preview" 
                                width="100%" 
                                height="500px" 
                                allow="autoplay">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Struktur Organisasi -->
            <div class="accordion-item">
                <div class="accordion-header">
                    <!-- <i class="fas fa-sitemap icon-header"></i> -->
                    <h2>Struktur Organisasi</h2>
                    <i class="fas fa-chevron-down accordion-icon"></i>
                </div>
                <div class="accordion-content">
                    <div class="card">
                        <img src="img/strukturorganisasi.jpg" alt="Struktur Organisasi">
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Section -->
        <div class="gallery-section">
            <div class="section-header">
                <i class="fas fa-camera icon-header"></i>
                <h2 class="section-title">Galeri Kegiatan</h2>
            </div>
            <div class="carousel-container">
                <div class="profile-image">
                    <img src="img/kegiatan1.jpeg" class="carousel-slide">
                    <img src="img/kegiatan2.jpeg" class="carousel-slide">
                    <img src="img/kegiatan3.jpeg" class="carousel-slide">
                </div>
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
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        /* Gallery Section */
        .gallery-section {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 2px solid #eee;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #022539;
            text-transform: uppercase;
        }

        .icon-header {
            font-size: 2rem;
            color: #022539;
        }

        /* Carousel Styles */
        .carousel-container {
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            display: flex;
            width: 100%;
            height: 400px;
            position: relative;
        }

        .carousel-slide {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-slide.active {
            opacity: 1;
        }

        /* Accordion Styles */
        .accordion-container {
            max-width: 1200px;
            margin: 40px auto;
        }

        .accordion-item {
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .accordion-header {
            display: flex;
            align-items: center;
            padding: 20px;
            background: #022539;
            color: white;
            cursor: pointer;
        }

        .accordion-header h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0 auto 0 15px;
        }

        .accordion-icon {
            color: white;
            transition: transform 0.3s ease;
        }

        .accordion-item.active .accordion-icon {
            transform: rotate(180deg);
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .accordion-content h3 {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0 auto;
            margin-bottom: 10px;
        }

        .accordion-content p {
            margin-bottom: 10px;
        }

        .accordion-item.active .accordion-content {
            max-height: 1000px;
        }

        .numbered-list {
            list-style-type: lower-alpha; /* Bikin numbering jadi a, b, c, dst. */
            padding-left: 20px;
        }

        .numbered-list li {
            margin-bottom: 8px; /* Biar ada jarak antar poin */
            line-height: 1.6;
        }

        .button-orange {
            display: block;  
            background-color: #FFA500;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
            text-align: center;
            margin: 20px auto;  
            width: fit-content; 
        }

        .button-orange:hover {
            background-color: #e69500;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <script>
    $(document).ready(function(){
        // Carousel functionality
        const slides = $('.carousel-slide');
        let currentSlide = 0;
        
        function showSlide(index) {
            slides.removeClass('active');
            slides.eq(index).addClass('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Show first slide initially
        showSlide(0);

        // Auto advance slides every 3 seconds
        setInterval(nextSlide, 3000);

        // Accordion functionality
        $('.accordion-header').click(function() {
            const accordionItem = $(this).parent();
            const isActive = accordionItem.hasClass('active');
            
            // Close all accordion items
            $('.accordion-item').removeClass('active');
            
            // If clicked item wasn't active, open it
            if (!isActive) {
                accordionItem.addClass('active');
            }
        });
    });
    </script>
@endsection