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
               <ul class="list-unstyled mt-3 fade-in">
    <li class="mb-4 p-4 service-box fade-in-item">
        <h5><img src="{{ asset('images/komplit.png') }}" alt="Komplit" class="me-2" style="width: 30px; height: 30px;"><strong>Komplit</strong></h5>
        <p>Layanan ini memungkinkan pelanggan untuk mencuci pakaian berdasarkan berat (kiloan). Ini adalah pilihan yang lebih ekonomis untuk mencuci banyak pakaian dalam satu waktu.</p>
        <p class="text-primary fw-bold simple-border">Harga: Rp. 6.000/kg</p>
    </li>
    <li class="mb-4 p-4 service-box fade-in-item">
        <h5><img src="{{ asset('images/setrika.png') }}" alt="Setrika" class="me-2" style="width: 30px; height: 30px;"><strong>Setrika</strong></h5>
        <p>Layanan ini menawarkan pencucian untuk item tertentu seperti selimut, jaket, atau pakaian dengan bahan khusus yang membutuhkan perlakuan tertentu.</p>
        <p class="text-primary fw-bold simple-border">Harga: Rp. 4.000/kg</p>
    </li>
    <li class="mb-4 p-4 service-box fade-in-item">
        <h5><img src="{{ asset('images/drying.png') }}" alt="Cuci Kering" class="me-2" style="width: 30px; height: 30px;"><strong>Cuci Kering</strong></h5>
        <p>Layanan cuci kering digunakan untuk pakaian atau tekstil yang tidak bisa dicuci dengan air, seperti jas, gaun, atau pakaian berbahan sutra dan wol.</p>
        <p class="text-primary fw-bold simple-border">Harga: Rp. 4.000/kg</p>
    </li>
</ul>
            </div>
            <img src="{{ asset('images/laundry.png') }}" alt="Laundry Go Image" class="img-fluid mt-5 rounded shadow-lg" style="max-width: 400px;">
        </div>
        <div class="team-section mt-5">
                <h3 class="fw-bold text-primary text-center position-relative feature-title">
                    <span>All About Teams</span>
                </h3>
                <p class="text-center"><b>Kami adalah tim yang berdedikasi untuk memberikan layanan laundry terbaik di asrama. Setiap anggota tim kami memiliki keahlian di bidangnya dan berkomitmen untuk menjaga kualitas dan kenyamanan pelanggan.</b></p>

        <div class="row mt-4">
                    <!-- Tim Member 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="team-member text-center">
                            <img src="{{ asset('images/.jpg') }}" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px;">
                            <h5 class="fw-bold">Daffa Akhadi Yoga Perdana</h5>
                            <p class="text-muted">lorem ipsum</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                        </div>
                    </div>

                    <!-- Tim Member 2 -->
                    <div class="col-md-4 mb-4">
                        <div class="team-member text-center">
                            <img src="{{ asset('images/team-member2.jpg') }}"  class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px;">
                            <h5 class="fw-bold">Muhammad Arrahman</h5>
                            <p class="text-muted">lorem ipsum</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                        </div>
                    </div>

                    <!-- Tim Member 3 -->
                    <div class="col-md-4 mb-4">
                        <div class="team-member text-center">
                            <img src="{{ asset('images/team-member3.jpg') }}" class="rounded-circle img-fluid mb-3" style="width: 150px; height: 150px;">
                            <h5 class="fw-bold">Yusuf Surya Mulyawan</h5>
                            <p class="text-muted">lorem ipsum</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.</p>
                        </div>
                    </div>
                </div>
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

   /* Border for each team member container */
.team-member {
    border: 2px solid #ddd; /* Border tipis dengan warna abu-abu */
    padding: 20px;
    border-radius: 15px; /* Membulatkan sudut border */
    transition: box-shadow 0.3s ease-in-out; /* Efek transisi saat hover */
}

.team-member:hover {
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Menambahkan efek shadow saat hover */
}

/* Border for team member images */
.team-member img {
    border: 4px solid black; /* Border berwarna biru untuk gambar anggota tim */
}

/* Border and background for team member name and description */
.team-member h5 {
    border-bottom: 2px solid black; /* Menambahkan garis bawah di nama anggota tim */
    padding-bottom: 10px;
    margin-bottom: 10px;
    color: #333; /* Warna teks nama */
}

</style>
