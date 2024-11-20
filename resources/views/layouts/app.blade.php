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

    <style>
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
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #c2def8;
            color: black;
            text-align: center;
            padding: 10px 0;
            z-index: 9999;
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

    </style>
</head>

<body style="background-color: #e0f7fa;">
    <div id="app" class="content-wrapper">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #c2def8;">
    <div class="container d-flex align-items-center">
        <!-- Tombol Sidebar -->
        <button class="btn btn-custom me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
            <i class="fas fa-bars"></i> Menu
        </button>

        <!-- Logo dan Teks Laundry Go -->
        <a class="navbar-brand text-black font-lemon d-flex align-items-center" href="{{ url('/') }}">
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
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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
                        <a class="btn btn-custom btn-primary w-100" href="{{ route('users.index') }}">Kelola User</a>
                    </li>
                    <li class="list-group-item">
                        <a class="btn btn-custom btn-primary w-100" href="{{ route('products.index') }}">Manajemen Pemesanan</a>
                    </li>
                    <li class="list-group-item">
                        <a class="btn btn-custom btn-primary w-100" href="{{ route('roles.index') }}">Kelola Role</a>
                    </li>
                    <li class="list-group-item">
                        <a class="btn btn-custom btn-primary w-100" href="{{ route('promos.index') }}">Kelola Promo</a>
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
    <nav class="navbar footer-navbar">
        <div class="container text-bg">
            <span class="mx-auto">&copy; 2024 Laundry Go. All rights reserved.</span>
        </div>
    </nav>
</body>
</html>
