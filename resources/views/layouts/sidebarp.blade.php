<!-- Sidebar Pembina -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Pembina</title>
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
            <h1 class="text-xl font-bold">Dinfo Magang</h1>
        </div>
        
        <a href="{{ route('profile.show') }}" class="profile-section {{ request()->routeIs('profile.show') ? 'active' : '' }}">
            <div class="profile-image">
                <img src="{{ Auth::user()->foto ? asset('img/profil/' . Auth::user()->foto) : asset('img/pasfoto.jpg') }}" 
                    alt="Foto Profil" 
                    class="w-full h-full object-cover rounded-full">
            </div>
            <div class="profile-info">
                @auth
                    <p class="mb-1">{{ Auth::user()->nama }}</p>
                    @if(Auth::user()->pembina)
                        <p>NIP. {{ Auth::user()->pembina->nip }}</p>
                    @endif
                @else
                    <p class="mb-1">Guest</p>
                @endauth
            </div>
        </a>

        <nav class="nav-menu">
            <a href="/pembina/beranda" class="menu-item" id="dashboardLink">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            <a href="/pembina/pendaftarmagang" class="menu-item" id="pendaftarLink">
                <i class="fas fa-user-plus"></i>
                <span>Pendaftar</span>
            </a>
            <a href="/pembina/pesertamagang" class="menu-item" id="pesertaLink">
                <i class="fas fa-users"></i>
                <span>Peserta Magang</span>
            </a>
            <a href="{{ route('logout') }}" 
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

    <script>
    const menuItems = document.querySelectorAll('.menu-item');
    
    function isPathMatch(currentPath, menuPath) {
        // Untuk path /pembina/infopendaftar/{nim_nisn}
        if (currentPath.startsWith('/pembina/infopendaftar/')) {
            return menuPath === '/pembina/pendaftarmagang';
        } 
        else if (currentPath.startsWith('/pembina/infopeserta/')) {
            return menuPath === '/pembina/pesertamagang';
        } 
        return currentPath === menuPath;
    }
    // Fungsi untuk mendapatkan path saat ini
    function getCurrentPath() {
        return window.location.pathname;
    }

    // Fungsi untuk mengatur menu aktif berdasarkan path
    function setActiveMenu() {
        const menuItems = document.querySelectorAll('.menu-item');
        // Hapus semua class active terlebih dahulu
        menuItems.forEach(item => item.classList.remove('active'));
        
        const currentPath = getCurrentPath();
        
        // Cari dan aktifkan menu yang sesuai dengan path saat ini
        menuItems.forEach(item => {
            const href = item.getAttribute('href');
            if (isPathMatch(currentPath, href)) {
                item.classList.add('active');
            }
        });
    }

    // Event listener untuk klik menu
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });

    document.addEventListener('DOMContentLoaded', setActiveMenu);

    
    </script>
</body>
</html>