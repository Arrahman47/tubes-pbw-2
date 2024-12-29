@extends('layouts.app')

@section('content')
<h2 class="text-primary fw-bold" style="color: #343a40;"><i class="fas fa-home me-2"></i>Dashboard</h2>
<div class="text-center py-5" style="background-image: url('https://example.com/your-image.jpg'); background-size: cover; background-position: center; color: black;">
    <h1 class="animate__animated animate__fadeInDown">Selamat Datang, {{ Auth::user()->name }} di Laundry Go!</h1>
    <p class="animate__animated animate__fadeInUp animate__delay-1s">Yeay! Kamu berhasil login ke layanan Laundry kami.</p>
    <p class="animate__animated animate__fadeInUp animate__delay-2s">Kami siap membantu kamu mencuci pakaian dengan layanan terbaik. Nikmati pengalaman mencuci yang mudah dan cepat!</p>
    
    <div class="mt-4">
        <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg animate__animated animate__pulse animate__infinite">
            <i class="fa-solid fa-cart-plus me-2"></i> Mulai Pemesanan
        </a>
        <p class="mt-2 animate__animated animate__fadeInUp animate__delay-3s">Atau, kelola pemesananmu dengan mudah di <strong>Manajemen Pemesanan</strong>.</p>
    </div>
</div>

<!-- Statistik layanan dengan animasi hover tambahan -->
<div class="container mt-5">
    <h3 class="text-center text-primary fw-bold animate__animated animate__fadeInDown">Statistik Layanan</h3>
    <div class="row text-center mt-4">
        <!-- Pesanan Terselesaikan -->
        <div class="col-md-4 animate__animated animate__zoomIn animate__delay-1s">
            <div class="card text-white bg-primary card-hover">
                <div class="card-body">
                    <i class="fas fa-check-circle fa-3x mb-3"></i>
                    <h3 class="card-title">100+</h3>
                    <p class="card-text">Pesanan Terselesaikan</p>
                </div>
            </div>
        </div>
        <!-- Pelanggan Setia -->
        <div class="col-md-4 animate__animated animate__zoomIn animate__delay-1.5s">
            <div class="card text-white bg-success card-hover">
                <div class="card-body">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h3 class="card-title">50+</h3>
                    <p class="card-text">Pelanggan Setia</p>
                </div>
            </div>
        </div>
        <!-- Rating Layanan -->
        <div class="col-md-4 animate__animated animate__zoomIn animate__delay-2s">
            <div class="card text-white bg-warning card-hover">
                <div class="card-body">
                    <i class="fas fa-star fa-3x mb-3"></i>
                    <h3 class="card-title">5/5</h3>
                    <p class="card-text">Rating Layanan Google Maps</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Layanan Unggulan dengan animasi hover tambahan -->
<div class="container mt-5">
    <h3 class="text-center text-primary fw-bold animate__animated animate__fadeInDown">Layanan Unggulan</h3>
    <div class="row text-center mt-4">
        <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
            <div class="card border-primary card-hover">
                <div class="card-body">
                    <i class="fas fa-tshirt fa-3x text-primary"></i>
                    <h5 class="card-title mt-3">Cuci & Lipat</h5>
                    <p class="card-text">Layanan mencuci dan melipat pakaian dengan cepat.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1.5s">
            <div class="card border-success card-hover">
                <div class="card-body">
                    <i class="fas fa-wind fa-3x text-success"></i>
                    <h5 class="card-title mt-3">Cuci Kering</h5>
                    <p class="card-text">Untuk pakaian yang butuh perawatan ekstra.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
            <div class="card border-warning card-hover">
                <div class="card-body">
                    <i class="fas fa-shipping-fast fa-3x text-warning"></i>
                    <h5 class="card-title mt-3">Antar Jemput</h5>
                    <p class="card-text">Hemat waktu dengan layanan antar jemput pakaian.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Testimoni pelanggan dengan animasi -->
<div class="container mt-5">
    <h3 class="text-center text-primary fw-bold animate__animated animate__fadeInDown">Apa Kata Pelanggan?</h3>
    <div class="row mt-4">
        <div class="col-md-4 animate__animated animate__fadeIn animate__delay-1s">
            <div class="card border-info">
                <div class="card-body">
                    <blockquote class="blockquote">
                        <p>"Layanannya sangat cepat dan hasilnya memuaskan!"</p>
                        <footer class="blockquote-footer">Rina, Bandung</footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-4 animate__animated animate__fadeIn animate__delay-1.5s">
            <div class="card border-secondary">
                <div class="card-body">
                    <blockquote class="blockquote">
                        <p>"Laundry Go benar-benar membantu saya menghemat waktu!"</p>
                        <footer class="blockquote-footer">Andi, Jakarta</footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-4 animate__animated animate__fadeIn animate__delay-2s">
            <div class="card border-danger">
                <div class="card-body">
                    <blockquote class="blockquote">
                        <p>"Pakaiannya bersih dan harum. Recommended!"</p>
                        <footer class="blockquote-footer">Dewi, Surabaya</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Tambahkan link untuk animasi CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style>
/* Efek hover pada kotak */
.card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-hover:hover {
    transform: scale(1.05); /* Perbesar sedikit */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Tambahkan bayangan */
    cursor: pointer; /* Ubah kursor menjadi pointer */
}
</style>
