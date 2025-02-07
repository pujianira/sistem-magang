<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Pendaftar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            width: 280px;
            height: 100vh;
            background-color: #022539;
            color: white;
            padding: 1.5rem;
            overflow-y: auto;
        }

        .main-content {
            margin-left: 240px; /* Sesuaikan dengan width sidebar */
            padding: 1.5rem;
            min-height: 100vh;
        }

        .sidebar-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            color: #9CA3AF;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .menu-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .menu-item.active {
            background-color: white;
            color: #022539;
            font-weight: 600;
        }

        .menu-item i {
            width: 20px;
            margin-right: 0.75rem;
        }

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
            text-decoration: none;
        }

        .profile-image {
            width: 96px;
            height: 96px;
            background-color: #ccc;
            border-radius: 50%;
            margin-bottom: 1rem;
            transition: transform 0.3s ease; 
        }

        .profile-info {
            text-align: center;
            font-size: 0.875rem;
        }

        .profile-section:hover .profile-image,
        .profile-section.active .profile-image{
            transform: scale(1.1); 
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h1 class="text-xl font-bold">DinfoMagang</h1>
        </div>
        
        <a href="{{ route('profile.show') }}" class="profile-section {{ request()->routeIs('profile.show') ? 'active' : '' }}">
            <div class="profile-image">
                <img src="{{ Auth::user()->foto ? asset('img/profil/' . Auth::user()->foto) : asset('img/pasfoto.jpg') }}" 
                    alt="Foto Profil" 
                    class="w-full h-full object-cover rounded-full">
            </div>
            <div class="profile-info">
                <p class="mb-1">{{ $user->nama }}</p>
                <p>NIS/NIM. {{ $user->pendaftar->nim_nisn }}</p>
            </div>
        </a>

        <nav class="nav-menu">
            <a href="{{ route('beranda-Pendaftar') }}" 
                class="menu-item flex items-center p-2 rounded
                {{ request()->routeIs('beranda-Pendaftar') ? 'active' : 'text-gray-700' }}">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>

            <a href="{{ route('daftarmagang') }}"
                class="menu-item flex items-center p-2 rounded
                {{ request()->routeIs('daftarmagang') ? 'active' : 'text-gray-700' }}">
                <i class="fas fa-clipboard-list"></i>
                <span>Daftar Magang</span>
            </a>

            <a href="{{ route('kirimLaporan') }}"
                class="menu-item flex items-center p-2 rounded
                {{ request()->routeIs('kirimLaporan') ? 'active' : 'text-gray-700' }}">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>

            <a href="{{ route('login') }}" 
                class="menu-item" 
                id="logoutLink"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Log Out</span>
            </a>

            <!-- Form Logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Isi main content Anda di sini -->
        @yield('content')
    </div>

    {{-- <script>
    const menuItems = document.querySelectorAll('.menu-item');

    // Fungsi untuk mendapatkan path saat ini
    function getCurrentPath() {
        return window.location.pathname;
    }

    // Fungsi untuk mengatur menu aktif berdasarkan path
    function setActiveMenu() {
        // Hapus semua class active terlebih dahulu
        menuItems.forEach(item => item.classList.remove('active'));
        
        const currentPath = getCurrentPath();
        // Cari dan aktifkan menu yang sesuai dengan path saat ini
        menuItems.forEach(item => {
            const href = item.getAttribute('href');
            if (currentPath === href) {
                item.classList.add('active');
            }
        });
    }

    // Event listener untuk klik menu
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            menuItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });

    setActiveMenu();
    </script> --}}
</body>
</html>