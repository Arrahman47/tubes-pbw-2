 <!-- @extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-8">
            <h2 class="text-primary fw-bold"><i class="fa-solid fa-plus me-2"></i>Buat Promo Baru</h2>
            <p class="text-muted">Isi detail promo baru Anda dengan benar untuk menarik pelanggan.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('promos.index') }}" class="btn btn-secondary btn-lg shadow-sm">
                <i class="fa fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><i class="fa-solid fa-exclamation-circle me-2"></i>Oops!</strong> Ada beberapa kesalahan pada input Anda:
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('promos.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_promo" class="form-label">Nama Promo</label>
                    <input type="text" name="nama_promo" id="nama_promo" class="form-control" placeholder="Masukkan nama promo" required>
                </div>
                <div class="mb-3">
                    <label for="kode_promo" class="form-label">Kode Promo</label>
                    <textarea name="kode_promo" id="kode_promo" class="form-control" rows="3" placeholder="Kode promo" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon (%)</label>
                    <input type="number" name="diskon" id="diskon" class="form-control" placeholder="Masukkan diskon (0-100)" min="0" max="100" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                        <i class="fa-solid fa-save me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
