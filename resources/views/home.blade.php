@extends('layouts.app')

@section('content')
    <div class="text-center">
        <div class="hero-section py-5 rounded shadow-sm">
            <h1 class="display-4 text-primary fw-bold mb-3">We Are The Best Dorm Laundry Services</h1>
            <h2 class="text-dark mb-3"><b>"Clean Wash Everyday"</b></h2>
            <p class="text-muted mb-5">Nikmati layanan laundry terbaik untuk kenyamanan dan kebersihan Anda setiap hari!</p>
            
            <div class="service-section mt-5 text-start mx-auto" style="max-width: 800px;">
                <h3 class="fw-bold text-primary"><strong>Kami memiliki layanan:</strong></h3>
                <ul class="list-unstyled mt-3 fade-in">
                    <li class="mb-4 p-4 service-box fade-in-item">
                        <h5><strong>Cuci Kiloan:</strong></h5>
                        <p>Layanan ini memungkinkan pelanggan untuk mencuci pakaian berdasarkan berat (kiloan). Ini adalah pilihan yang lebih ekonomis untuk mencuci banyak pakaian dalam satu waktu.</p>
                    </li>
                    <li class="mb-4 p-4 service-box fade-in-item">
                        <h5><strong>Cuci Satuan:</strong></h5>
                        <p>Layanan ini menawarkan pencucian untuk item tertentu seperti selimut, jaket, atau pakaian dengan bahan khusus yang membutuhkan perlakuan tertentu.</p>
                    </li>
                    <li class="mb-4 p-4 service-box fade-in-item">
                        <h5><strong>Cuci Kering:</strong></h5>
                        <p>Layanan cuci kering digunakan untuk pakaian atau tekstil yang tidak bisa dicuci dengan air, seperti jas, gaun, atau pakaian berbahan sutra dan wol.</p>
                    </li>
                </ul>
            </div>

            <img src="{{ asset('images/laundry.png') }}" alt="Laundry Go Image" class="img-fluid mt-5 rounded shadow-lg" style="max-width: 400px;">
        </div>
    </div>
@endsection

<style>
    /* Keyframes for Fade-In Animation */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* Apply Animation to Container */
    .fade-in {
        animation: fadeIn 1s ease-out;
    }

    /* Apply Staggered Animation to Each Item */
    .fade-in-item {
        opacity: 0;
        animation: fadeIn 0.8s ease-out forwards;
        animation-delay: 0.5s;
    }

    /* Delay for Each List Item */
    .fade-in-item:nth-child(2) {
        animation-delay: 0.7s;
    }

    .fade-in-item:nth-child(3) {
        animation-delay: 0.9s;
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

    /* Styling untuk Judul dan Teks */
    .service-box h5 {
        color: #007bff;
        margin-bottom: 8px;
    }

    /* Hero Section Styling */
    .hero-section {
        background: linear-gradient(135deg, white, white);
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
