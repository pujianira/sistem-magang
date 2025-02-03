<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Scroll Effect</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Header Awal */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #022539; /* Warna awal */
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            z-index: 1000;
        }

        /* Header Saat Discroll */
        .header.scrolled {
            background-color: white; /* Warna saat discroll */
            color: #022539; /* Warna font saat discroll */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }

        /* Warna Link Saat Header Discroll */
        .header.scrolled a {
            color: #022539; /* Warna navy */
        }

        .header.scrolled a:hover {
            color: #F97316; /* Warna hover tetap oranye */
        }

        /* Supaya konten tidak ketutupan header */
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <h1 class="text-xl font-bold">Dinfo Magang</h1>
            <nav>
                <ul class="flex items-center space-x-10">
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

    <!-- JavaScript untuk Mengubah Warna Header Saat Discroll -->
    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector(".header");
            if (window.scrollY > 50) { // Kalau scroll lebih dari 50px
                header.classList.add("scrolled");
            } else {
                header.classList.remove("scrolled");
            }
        });
    </script>

</body>
</html>