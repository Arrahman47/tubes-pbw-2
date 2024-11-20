@extends('layouts.app')

@section('content')
<h2 class="text-primary fw-bold" style="color: #343a40;"><i class="fas fa-home me-2"></i>Dashboard</h2>
    <div class="text-center py-5" style="background-image: url('https://example.com/your-image.jpg'); background-size: cover; background-position: center; color: black;">
        <h1 class="animate__animated animate__fadeIn">Selamat Datang, {{ Auth::user()->name }} di Laundry Go!</h1>
        <p class="animate__animated animate__fadeIn animate__delay-1s">Yeay! Kamu berhasil login ke layanan Laundry kami.</p>
        <p class="animate__animated animate__fadeIn animate__delay-2s">Kami siap membantu kamu mencuci pakaian dengan layanan terbaik. Nikmati pengalaman mencuci yang mudah dan cepat!</p>
        
        <div class="mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg animate__animated animate__pulse animate__infinite">
                <i class="fa-solid fa-cart-plus me-2"></i> Mulai Pemesanan
            </a>
            <p class="mt-2 animate__animated animate__fadeIn animate__delay-3s">Atau, kelola pemesananmu dengan mudah di <strong>Manajemen Pemesanan</strong>.</p>
        </div>
    </div>
@endsection

<!-- Tambahkan link untuk animasi CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
