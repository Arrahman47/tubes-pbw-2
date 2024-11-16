@extends('layouts.app')

@section('content')
    <div class="text-center">
        <div class="hero-section py-5 rounded shadow-sm">
            <h1 class="display-4 text-primary fw-bold mb-3">We Are The Best Dorm Laundry Services</h1>
            <h2 class="text-black mb-3"><b>"Clean Wash Everyday"</b></h2>
            <p class="text-muted mb-5">Nikmati layanan laundry terbaik untuk kenyamanan dan kebersihan Anda setiap hari!</p>
            
            <div class="service-section mt-5 mx-auto" style="max-width: 800px;">
                <h3 class="fw-bold text-primary text-center position-relative feature-title">
                    <span>Kami memiliki layanan:</span>
                </h3>
                <ul class="list-unstyled mt-3 fade-in">
                    <li class="mb-4 p-4 service-box fade-in-item">
                        <h5><strong>Komplit</strong></h5>
                        <p>Layanan ini memungkinkan pelanggan untuk mencuci pakaian berdasarkan berat (kiloan). Ini adalah pilihan yang lebih ekonomis untuk mencuci banyak pakaian dalam satu waktu.</p>
                        <p class="text-primary fw-bold simple-border">Harga: Rp. 6.000/kg</p>

                    </li>
                    <li class="mb-4 p-4 service-box fade-in-item">
                        <h5><strong>Setrika</strong></h5>
                        <p>Layanan ini menawarkan pencucian untuk item tertentu seperti selimut, jaket, atau pakaian dengan bahan khusus yang membutuhkan perlakuan tertentu.</p>
                        <p class="text-primary fw-bold simple-border">Harga: Rp. 4.000/kg</p>
                    </li>
                    <li class="mb-4 p-4 service-box fade-in-item">
                        <h5><strong>Cuci Kering</strong></h5>
                        <p>Layanan cuci kering digunakan untuk pakaian atau tekstil yang tidak bisa dicuci dengan air, seperti jas, gaun, atau pakaian berbahan sutra dan wol.</p>
                        <p class="text-primary fw-bold simple-border">Harga: Rp. 4.000/kg</p>
                    </li>
                </ul>
            </div>

            <img src="{{ asset('images/laundry.png') }}" alt="Laundry Go Image" class="img-fluid mt-5 rounded shadow-lg" style="max-width: 400px;">
        </div>
    </div>
@endsection

<style>
    /* Styling untuk Border Sederhana */
.simple-border {
    display: inline-block;
    padding: 8px 16px;
    border: 1px solid #007bff; /* Warna border */
    border-radius: 4px;        /* Sedikit melengkung pada sudut */
    background-color: #ffffff; /* Latar belakang putih */
    color: #007bff;           /* Warna teks */
    font-size: 1rem;          /* Ukuran teks */
    font-weight: bold;        /* Teks tebal */
}

    /* Border horizontal untuk "Kami memiliki layanan:" */
    .feature-title {
        display: inline-block;
        padding: 10px 20px;
        position: relative;
        background-color: #e0f7fa; /* Background judul */
        z-index: 1;
    }

    .feature-title:before,
    .feature-title:after {
        content: '';
        position: absolute;
        top: 50%;
        width: 40%;
        height: 4px;
        background-color: #007bff; /* Warna border */
        z-index: -1;
    }

    .feature-title:before {
        left: 0;
        transform: translate(-100%, -50%);
    }

    .feature-title:after {
        right: 0;
        transform: translate(100%, -50%);
    }

    /* Border Kotak Hanya di Samping */
    .service-box {
        border-left: 4px solid #007bff;   /* Border di sisi kiri */
        border-right: 4px solid #007bff;  /* Border di sisi kanan */
        padding: 16px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    /* Hover Effect for Service Box */
    .service-box:hover {
        transform: scale(1.02);
        background-color: #e3f2fd;
    }

    /* Keyframes for Fade-In Animation */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 1s ease-out;
    }

    .fade-in-item {
        opacity: 0;
        animation: fadeIn 0.8s ease-out forwards;
        animation-delay: 0.5s;
    }

    .fade-in-item:nth-child(2) {
        animation-delay: 0.7s;
    }

    .fade-in-item:nth-child(3) {
        animation-delay: 0.9s;
    }

    /* Hero Section Styling */
    .hero-section {
        background: linear-gradient(135deg, #e0f7fa, #c2def8);
        color: #333;
        padding: 60px 20px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    /* Image Styling */
    .img-fluid {
        transition: transform 0.3s ease;
    }

    .img-fluid:hover {
        transform: scale(1.05);
    }
</style>
