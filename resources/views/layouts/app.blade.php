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
            background-color: #c2def8;
            color: black;
            text-align: right;
        }
        /* Styling Footer */
.footer-navbar {
    position: fixed; /* Menempel di bawah layar */
    bottom: 0;
    left: 0;
    width: 100%; /* Agar footer mengisi seluruh lebar */
    background-color: #c2def8; /* Sesuaikan warna sesuai kebutuhan */
    color: black; /* Teks footer berwarna putih */
    text-align: center;
    padding: 10px 0; /* Padding agar footer terlihat lebih rapi */
    z-index: 9999; /* Pastikan footer berada di atas konten lainnya */
}

/* Tambahkan sedikit padding bawah pada konten agar tidak tertutup footer */
body {
    padding-bottom: 50px; /* Sesuaikan sesuai tinggi footer */
}
    .navbar-nav .nav-item {
        margin-right: 20px; /* Memberikan ruang antara setiap tombol */
    }

    .navbar-nav .nav-item .btn-custom {
        padding: 10px 20px;
        margin: 5px;
        border-radius: 25px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        color: white;
    }

    .navbar-nav .nav-item .btn-primary {
        background-color: #007bff;
    }

    .navbar-nav .nav-item .btn-success {
        background-color: #28a745;
    }

    .navbar-nav .nav-item .btn-warning {
        background-color: #ffc107;
    }

    .navbar-nav .nav-item .btn-info {
        background-color: #17a2b8;
    }

    /* Hover effect */
    .navbar-nav .nav-item .btn-custom:hover {
        opacity: 0.8;
        transform: scale(1.05);
    }
</style>

</style>


    </style>
</head>

<body style="background-color: #e0f7fa;">
    <div id="app" class="content-wrapper">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #c2def8;">
            <div class="container">
                <a class="navbar-brand navbar-brand-custom text-black font-lemon" href="{{ url('/') }}" style="color: black;">
                    <img src="{{ asset('images/laundry.png') }}" alt="Logo" style="width: 80px; height: 80px; margin-right: 5px;">
                    Laundry Go
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto"></ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
    <a class="btn btn-custom btn-primary" href="{{ route('users.index') }}">Kelola User</a>
</li>
<li class="nav-item">
    <a class="btn btn-custom btn-primary" href="{{ route('products.index') }}">Manajemen Pemesanan</a>
</li>
<li class="nav-item">
    <a class="btn btn-custom btn-primary" href="{{ route('roles.index') }}">Kelola Role</a>
</li>
<li class="nav-item">
    <a class="btn btn-custom btn-primary" href="{{ route('promos.index') }}">Kelola Promo</a>
</li>


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            </div>
        </nav>

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