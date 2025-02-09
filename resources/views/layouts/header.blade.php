<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            background-color: #022539; 
            color: white;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            z-index: 1000;
        }

        /* .header.scrolled {
            background-color: white; 
            color: #022539; 
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
        } */
        /* .header.scrolled {
            background-color: #022539; 
            color: white; 
            box-shadow: none; 
        } */

        /* .header.scrolled a {
            color: #022539; 
        }

        .header.scrolled a:hover {
            color: #F97316; 
        } */

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px; 
        }

        .logo-container img {
            height: 40px; 
        }

        .logo-container span {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>
    <header class="header flex items-center justify-between px-6">
        <div class="logo-container flex items-center">
            <img src="img/Lambang_Kota_Semarang.png" alt="Logo Pemkot Semarang" class="h-10">
            <span class="text-xl font-bold ml-3">DINFO MAGANG</span>
        </div>
            <nav>
                <ul class="flex items-center space-x-28 transform -translate-x-6">
                    <li>
                        <a href="{{ route('home') }}" 
                           class="font-bold hover:text-orange-300 pb-2 {{ Request::routeIs('home') ? 'border-b-2 border-orange-500' : '' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil') }}" 
                           class="font-bold hover:text-orange-300 pb-2 {{ Request::routeIs('profil') ? 'border-b-2 border-orange-500' : '' }}">
                            Profil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('info-bidang') }}" 
                           class="font-bold hover:text-orange-300 pb-2 {{ Request::routeIs('info-bidang') ? 'border-b-2 border-orange-500' : '' }}">
                            Info Bidang
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kontak') }}" 
                           class="font-bold hover:text-orange-300 pb-2 {{ Request::routeIs('kontak') ? 'border-b-2 border-orange-500' : '' }}">
                            Kontak
                        </a>
                    </li>
                    <li class="flex space-x-2">
                        <a href="{{ route('login') }}" 
                           class="bg-orange-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-orange-600">
                            Login
                        </a>
                        <a href="{{ route('register') }}" 
                           class="bg-orange-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-orange-600">
                            Daftar
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector(".header");
            if (window.scrollY > 50) { 
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    </script>
</body>
</html>