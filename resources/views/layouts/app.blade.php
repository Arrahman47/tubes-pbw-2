<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="shortcut icon" type="image/png" href="{{ asset ('images/laundry.png') }}">

    <style>
        /* Ubah background sidebar menu */
#sidebarMenu .offcanvas-body {
    background-color: #353c3d; /* Mengubah background menu */
}

#sidebarMenu .list-group-item {
    background-color: #353c3d; /* Ubah warna latar belakang setiap item */
    border: none; /* Menghilangkan border item */
}

#sidebarMenu .list-group-item a {
    color: white; /* Warna teks item */
}

#sidebarMenu .list-group-item a:hover {
    background-color: #2c3333; /* Warna latar belakang saat hover */
    color: white; /* Warna teks saat hover */
}

        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content-wrapper {
            flex: 1;
        }
        .footer-navbar {
            height: 50px; /* Tinggi footer */
            background-color: #c2def8;
            color: black;
            text-align: center;
            line-height: 50px; /* Vertikal align */
            position: fixed; /* Tetap di bawah layar */
            bottom: 0; /* Menempel di bagian bawah */
            width: 100%;
            z-index: 10; /* Pastikan di atas elemen lain */
        }
        body {
            padding-bottom: 50px;
        }
        .btn-custom {
            background-color: #c2def8;
            color: black; /* Agar teks terlihat */
            border: none; /* Hilangkan border */
        }

        .btn-custom:hover {
            background-color: #a6cde4; /* Warna saat hover */
            color: black;
        }
        @keyframes attention-blink {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
}

.attention-btn {
    animation: attention-blink 1s infinite; /* Berkedip setiap 1 detik */
    transition: background-color 0.3s ease;
}

.attention-btn:hover {
    background-color: #e60000; /* Warna merah terang saat hover */
    color: white;
}



    </style>
</head>

<body style="background-color: #e0f7fa;">
    <div id="app" class="content-wrapper">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #c2def8;">
            <div class="container d-flex align-items-center">
                <!-- Tombol Sidebar -->
                @auth
                <button class="btn btn-custom me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                    <i class="fas fa-bars"></i> Menu
                </button>
                @endauth

                <!-- Logo dan Teks Laundry Go -->
                <a class="navbar-brand text-black font-lemon d-flex align-items-center">
                    <img src="{{ asset('images/laundry.png') }}" alt="Logo" style="width: 80px; height: 80px; margin-left: 5px;">
                    <span class="ms-2 fw-bold">Laundry Go</span>
                </a>

                <!-- Tombol Profil atau Login/Register -->
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('profile.edit') }}">
            {{ __('Edit Profil') }}
        </a>
        <!-- Logout option triggers confirmation -->
        <a class="dropdown-item" href="#" onclick="confirmLogout()">
            {{ __('Logout') }}
        </a>
    </div>

    <!-- Logout confirmation -->
    <div id="logout-confirmation" class="d-none">
        <p>Apakah Anda yakin ingin logout?</p>
        <button class="btn btn-success" onclick="logoutConfirm()">Iya</button>
        <button class="btn btn-secondary" onclick="cancelLogout()">Tidak</button>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
                            <div id="logout-confirmation" class="d-none">
    <p>Apakah Anda yakin ingin logout?</p>
    <button class="attention-btn btn btn-success" onclick="logoutConfirm()">Iya</button>
    <button class="btn btn-secondary" onclick="cancelLogout()">Tidak</button>
</div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>

        <!-- Sidebar Off-Canvas -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('dashboard') }}" class="btn btn-custom btn-primary w-100"><i class=" fas fa-home me-2"></i>Dashboard</a>
                    </li>
                   
                    <li class="list-group-item">
                    @role('Admin')
                        <a href="{{ route('users.index') }}" class="btn btn-custom btn-primary w-100">
                            <i class="fa-solid fa-users me-2"></i> Kelola User
                        </a>
                        @endrole
                    </li>
                    <li class="list-group-item">
                    
                        <a href="{{ route('products.index') }}" class="btn btn-custom btn-primary w-100">
                            <i class="fa-solid fa-box me-2"></i> Manajemen Pemesanan
                        </a>
                        
                    </li>
                    <li class="list-group-item">
                    @role('Admin')
                        <a href="{{ route('roles.index') }}" class="btn btn-custom btn-primary w-100">
                            <i class="fa-solid fa-user-shield me-2"></i> Kelola Role
                        </a>
                        @endrole
                    </li>
                    <li class="list-group-item">
                    @role('Admin')
                        <a href="{{ route('payments.index') }}" class="btn btn-custom btn-primary w-100">
                            <i class="fa-solid fa-box me-2"></i> Kelola Pembayaran
                        </a>
                        @endrole
                    </li>
                </ul>
            </div>
        </div>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body position-relative">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer Navbar di bagian bawah -->
    
    <footer class="footer-navbar">
        &copy; 2024 Laundry Go. All rights reserved.
    </footer>
    
    <script>
    function confirmLogout() {
    document.querySelector('.dropdown-menu').classList.add('d-none'); // Sembunyikan menu logout
    document.getElementById('logout-confirmation').classList.remove('d-none'); // Tampilkan konfirmasi
}

function logoutConfirm() {
    // Kirimkan form logout
    document.getElementById('logout-form').submit();
}

function cancelLogout() {
    // Sembunyikan konfirmasi dan kembalikan menu logout
    document.getElementById('logout-confirmation').classList.add('d-none');
    document.querySelector('.dropdown-menu').classList.remove('d-none');
}
</script>
</body>
</html>