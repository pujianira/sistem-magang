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

        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
        }

        .profile-image {
            width: 96px;
            height: 96px;
            background-color: #374151;
            border-radius: 50%;
            margin-bottom: 1rem;
        }

        .profile-info {
            text-align: center;
            font-size: 0.875rem;
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
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h1 class="text-xl font-bold">MAGANG DISKOMINFO</h1>
        </div>
        
        <div class="profile-section">
            <div class="profile-image"></div>
            <div class="profile-info">
                <p class="mb-1">Nama Pendaftar Magang</p>
                <p>NIS/NIM. 1234567890</p>
            </div>
        </div>

        <nav class="nav-menu">
            {{-- <a href="{{ route('beranda-Pendaftar') }}" class="menu-item" id="dashboardLink">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('beranda-Pendaftar') }}" 
                class="menu-item flex items-center p-2 rounded hover:bg-gray-200 hover:text-blue-500 font-semibold 
                {{ request()->routeIs('beranda-Pendaftar') ? 'menu-item.active bg-gray-200 text-blue-500 font-bold' : 'text-gray-700' }}">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a> --}}

            <a href="{{ route('beranda-Pendaftar') }}" 
                class="menu-item flex items-center p-2 rounded
                {{ request()->routeIs('beranda-Pendaftar') ? 'active' : 'text-gray-700' }}">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>

            <a href="#"
                class="menu-item flex items-center p-2 rounded
                {{ request()->routeIs('#') ? 'active' : 'text-gray-700' }}">
                <i class="fas fa-clipboard-list"></i>
                <span>Daftar Magang</span>
            </a>

            <a href="#"
                class="menu-item flex items-center p-2 rounded
                {{ request()->routeIs('#') ? 'active' : 'text-gray-700' }}">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>

            <a href="{{ route('logout') }}" 
                class="menu-item flex items-center p-2 rounded
                {{ request()->routeIs('logout') ? 'active' : 'text-gray-700' }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Log Out</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
            {{-- <a href="{{ route('logout') }}" 
                class="menu-item flex items-center p-2 rounded
                {{ request()->routeIs('logout') ? 'active' : 'text-gray-700' }}">
                <i class="fas fa-sign-out-alt"></i>
                <span>Log Out</span>
            </a> --}}

            {{-- <a href="#" class="menu-item" id="pendaftarLink">
                <i class="fas fa-clipboard-list"></i>
                <span>Daftar Magang</span>
            </a>
            <a href="#" class="menu-item" id="pesertaLink">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>
            <a href="{{ route('logout') }}" class="menu-item" id="logoutLink">
                <i class="fas fa-sign-out-alt"></i>
                <span>Log Out</span>
            </a>
            <a href="{{ route('beranda-Pendaftar') }}" 
                class="menu-item flex items-center p-2 rounded hover:bg-gray-200 hover:text-blue-500 font-semibold 
                {{ request()->routeIs('beranda-Pendaftar') ? 'bg-gray-200 text-blue-500 font-bold' : 'text-gray-700' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-700 mr-2" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Beranda</span>
            </a>
            <a href="#" 
                class="menu-item flex items-center p-2 rounded menu-item:hover hover:text-blue-500 font-semibold 
                {{ request()->routeIs('#') ? 'bg-gray-200 text-blue-500 font-bold' : 'text-gray-700' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-700 mr-2" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Beranda</span>
            </a> --}}
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