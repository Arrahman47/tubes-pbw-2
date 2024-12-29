@extends('layouts.app')

@section('content')
    <div class="text-center">
        <div class="hero-section py-5 rounded shadow-sm fade-in">
            <h1 class="display-4 fw-bold mb-3 color-change">We Are The Best Dorm Laundry Services</h1>
            <h2 class="text-black mb-3"><b>"Clean Wash Everyday"</b></h2>
            <p class="text-muted mb-5">Nikmati layanan laundry terbaik untuk kenyamanan dan kebersihan Anda setiap hari!</p>
            
            <div class="service-section mt-5 mx-auto" style="max-width: 800px;">
                <h3 class="fw-bold text-primary text-center position-relative feature-title">
                    <span>Kami memiliki layanan:</span>
                </h3>
                <div class="d-flex justify-content-start align-items-stretch gap-3 mt-3 fade-in">
    <!-- Layanan Komplit -->
    <div class="p-4 service-box fade-in-item position-relative border rounded shadow-sm flex-grow-1 text-center" style="flex-basis: 30%; min-height: 250px;">
        <div class="best-offer-badge position-absolute top-0 start-0 bg-warning text-dark px-3 py-1 rounded-end" style="font-size: 14px; font-weight: bold;">
            Best Offer!
        </div>
        <h5>
            <img src="{{ asset('images/komplit.png') }}" alt="Komplit" class="me-2" style="width: 30px; height: 30px;">
            <strong>Komplit</strong>
        </h5>
        <p>Layanan ini memungkinkan pelanggan untuk mencuci pakaian berdasarkan berat (kiloan). Ini adalah pilihan yang lebih ekonomis untuk mencuci banyak pakaian dalam satu waktu.</p>
        <p class="text-primary fw-bold simple-border">Harga: Rp. 6.000/kg</p>
    </div>

    <!-- Layanan Setrika -->
    <div class="p-4 service-box fade-in-item border rounded shadow-sm flex-grow-1 text-center" style="flex-basis: 30%; min-height: 250px;">
        <h5>
            <img src="{{ asset('images/setrika.png') }}" alt="Setrika" class="me-2" style="width: 30px; height: 30px;">
            <strong>Setrika</strong>
        </h5>
        <p>Layanan ini menawarkan pencucian untuk item tertentu seperti selimut, jaket, atau pakaian dengan bahan khusus yang membutuhkan perlakuan tertentu.</p>
        <p class="text-primary fw-bold simple-border">Harga: Rp. 4.000/kg</p>
    </div>

    <!-- Layanan Cuci Kering -->
    <div class="p-4 service-box fade-in-item border rounded shadow-sm flex-grow-1 text-center" style="flex-basis: 30%; min-height: 250px;">
        <h5>
            <img src="{{ asset('images/drying.png') }}" alt="Cuci Kering" class="me-2" style="width: 30px; height: 30px;">
            <strong>Cuci Kering</strong>
        </h5>
        <p>Layanan cuci kering digunakan untuk pakaian atau tekstil yang tidak bisa dicuci dengan air, seperti jas, gaun, atau pakaian berbahan sutra dan wol.</p>
        <p class="text-primary fw-bold simple-border">Harga: Rp. 4.000/kg</p>
    </div>
</div>
            </div>
            <img src="{{ asset('images/laundry.png') }}" alt="Laundry Go Image" class="img-fluid mt-5 rounded shadow-lg" style="max-width: 400px;">
        </div>

        <div class="team-section mt-5">
            <h3 class="fw-bold text-primary text-center position-relative feature-title">
                <span>All About Teams</span>
            </h3>
            <p class="text-center"><b>Kami dari STARWOVI tim yang berdedikasi untuk memberikan layanan laundry terbaik di asrama. Setiap anggota tim kami memiliki keahlian di bidangnya dan berkomitmen untuk menjaga kualitas dan kenyamanan pelanggan.</b></p>

            <div class="row mt-4">
                <!-- Tim Member 1 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member text-center fade-in-item">
                        <img src="{{ asset('images/daffa.jpg') }}" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px;">
                        <h5 class="fw-bold">Daffa Akhadi Yoga Perdana</h5>
                        <p class="text-muted">Front End Developer</p>
                        <p>Saya bertanggung jawab merancang tampilan dan antarmuka pengguna aplikasi laundry, memastikan pengalaman yang mudah digunakan bagi pelanggan dan admin, serta menampilkan informasi secara jelas dan menarik.</p>

                    </div>
                </div>

                <!-- Tim Member 2 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member text-center fade-in-item">
                        <img src="{{ asset('images/rahman.jpg') }}" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px;">
                        <h5 class="fw-bold">Muhammad Arrahman</h5>
                        <p class="text-muted">Back End Developer</p>
                        <p>Saya bertanggung jawab mengelola server, database, dan sistem yang mendukung operasional aplikasi laundry, memastikan bahwa data pelanggan dan transaksi diproses dengan aman dan efisien untuk memberikan layanan yang cepat dan andal.</p>

                    </div>
                    <div class="text-center">
    <a href="{{ route('login') }}" class="btn btn-primary mt-3">
        Pesan Laundry Sekarang
    </a>
</div>
                </div>

                <!-- Tim Member 3 -->
                <div class="col-md-4 mb-4">
                    <div class="team-member text-center fade-in-item">
                        <img src="{{ asset('images/yusuf.jpg') }}" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px;">
                        <h5 class="fw-bold">Yusuf Surya Mulyawan</h5>
                        <p class="text-muted">Front End & Back End Developer</p>
                        <p>Saya bertanggung jawab dalam mengembangkan dan memelihara seluruh sistem aplikasi laundry, baik dari sisi tampilan yang user-friendly untuk pelanggan dan admin, serta memastikan fungsi backend yang berjalan dengan lancar.</p> 
                </div>

            </div>
        </div>
    </div>
@endsection

<style>
     .color-change {
        animation: colorAnimation 4s infinite;
    }

    @keyframes colorAnimation {
        0% {
            color: #007bff; /* Warna biru */
        }
        25% {
            color: #28a745; /* Warna hijau */
        }
        50% {
            color: #dc3545; /* Warna merah */
        }
        75% {
            color: #ffc107; /* Warna kuning */
        }
        100% {
            color: #007bff; /* Warna biru */
        }
    }
    img:hover {
    transform: scale(1.1); /* Memperbesar gambar saat kursor mengarah */
}
img {
    transition: transform 0.3s ease-in-out; /* Efek transisi yang halus */
}
    @media (max-width: 768px) {
    .service-box {
        flex-basis: 100%;
    }
}

    /* Styling untuk Border Sederhana */
    .simple-border {
        display: inline-block;
        padding: 8px 16px;
        border: 1px solid #007bff;
        border-radius: 4px;
        background-color: #ffffff;
        color: #007bff;
        font-size: 1rem;
        font-weight: bold;
    }

    .feature-title {
        display: inline-block;
        padding: 10px 20px;
        position: relative;
        background-color: #e0f7fa;
        z-index: 1;
    }

    .feature-title:before,
    .feature-title:after {
        content: '';
        position: absolute;
        top: 50%;
        width: 40%;
        height: 4px;
        background-color: #007bff;
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

    .service-box {
        border-left: 4px solid #007bff;
        border-right: 4px solid #007bff;
        padding: 16px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .service-box:hover {
        transform: scale(1.02);
        background-color: #e3f2fd;
    }

    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    .fade-in {
        animation: fadeIn 1s ease-out;
    }

    .fade-in-item {
        opacity: 0;
        animation: fadeIn 1s ease-out forwards;
        animation-delay: 0.5s;
    }

    .fade-in-item:nth-child(2) {
        animation-delay: 0.7s;
    }

    .fade-in-item:nth-child(3) {
        animation-delay: 0.9s;
    }

    .hero-section {
        background: linear-gradient(135deg, #e0f7fa, #c2def8);
        color: #333;
        padding: 60px 20px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .team-member {
        border: 2px solid #ddd;
        padding: 20px;
        border-radius: 15px;
        transition: box-shadow 0.3s ease-in-out;
        animation: fadeIn 1s ease-out forwards;
        animation-delay: 0.7s;
    }

    .team-member:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .team-member img {
    width: 150px;
    height: 150px;
    object-fit: cover;  /* Ensures the image fits within the container */
    border-radius: 50%; /* Makes the image circular */
}


    .team-member h5 {
        border-bottom: 2px solid black;
        padding-bottom: 10px;
        margin-bottom: 10px;
        color: #333;
    }
</style>
