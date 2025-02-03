@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <div class="container mx-auto flex items-center justify-between py-30">
        <div class="banner">
            <div class ="overlay"></div>
            <div class="banner-text">
                <h1>Selamat Datang</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <p>
            </div> 
        </div>
    </div>
    <section class="about-section">
        <div class="about-content">
            <div class="about-text">
                <h2>Tentang Instansi</h2>
                <p> Instansi kami adalah lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <p>
            </div> 
            <div class="about-image">
                <img src="img/pintu.jpeg" alt="Gambar Instansi">
            </div>
        </div>
    </section>

    <style>
        .banner {
            position: relative;
            width: 100%;
            height: 300px;
            background: url('img/pintu.jpeg') center/cover no-repeat;
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
            z-index: 0;
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
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa; /* Warna latar belakang opsional */
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 40px; /* Jarak antara teks dan gambar */
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
            border-radius: 10px; /* Biar sudutnya agak melengkung */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }
        </style>
@endsection