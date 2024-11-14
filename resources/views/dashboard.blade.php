@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Selamat Datang, {{ Auth::user()->name }} di Laundry Go!</h1>
        <p>Yeay! Kamu berhasil login ke layanan Laundry kami.</p>
        <p>Kami siap membantu kamu mencuci pakaian dengan layanan terbaik. Nikmati pengalaman mencuci yang mudah dan cepat!</p>
        
        <div class="mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary btn-lg">
                Mulai Pemesanan
            </a>
            <p class="mt-2">Atau, kelola pemesananmu dengan mudah di <strong>Manajemen Pemesanan</strong>.</p>
        </div>
    </div>
@endsection
