@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>We Are The Best Dorm Laundry Services</h1>
        <h2><b>"Clean Wash Everyday"</b></h2>
        <h3 style="text-align: left;">
        <strong>Kami memiliki layanan:</strong><br><br>

<ul style="text-align: left;">
    <li>
        <strong>Cuci Kiloan:</strong>
        <p>Layanan ini memungkinkan pelanggan untuk mencuci pakaian berdasarkan berat (kiloan). Ini adalah pilihan yang lebih ekonomis untuk mencuci banyak pakaian dalam satu waktu.</p>
    </li>
    <li>
        <strong>Cuci Satuan:</strong>
        <p>Layanan ini menawarkan pencucian untuk item tertentu seperti selimut, jaket, atau pakaian dengan bahan khusus yang membutuhkan perlakuan tertentu.</p>
    </li>
    <li>
        <strong>Cuci Kering:</strong>
        <p>Layanan cuci kering digunakan untuk pakaian atau tekstil yang tidak bisa dicuci dengan air, seperti jas, gaun, atau pakaian berbahan sutra dan wol.</p>
    </li>
</ul>

</h3>


        <img src="{{ asset('images/laundry.png') }}" alt="Laundry Go Image" class="img-fluid mt-4" style="max-width: 450px;">
    </div>
@endsection
