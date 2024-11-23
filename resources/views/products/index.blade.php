@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-8">
            <h2 class="text-primary fw-bold"><i class="fa-solid fa-box me-2"></i>Pemesanan</h2>
            <p class="text-muted">Kelola semua pemesanan yang telah dibuat dengan mudah.</p>
        </div>
        <div class="col-md-4 text-md-end">
            @can('laundry-create')
            <a href="{{ route('products.create') }}" class="btn btn-success btn-lg shadow-sm">
                <i class="fa fa-plus me-2"></i>Tambah Pemesanan
            </a>
            @endcan
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Menampilkan jumlah pemesanan -->
    <div class="mb-4 text-center py-3 bg-warning rounded shadow-sm border border-primary d-inline-block">
    <h4 class="fw-bold text-dark">
        <i class="fa-solid fa-list me-2"></i>{{ $orderCount }} Orders Pending
    </h4>
</div>

<div class="mb-4 text-center py-3 bg-success rounded shadow-sm border border-primary d-inline-block">
    <h4 class="fw-bold text-white">
        <i class="fa-solid fa-check me-2"></i>{{ $orderCount}} Orders Accepted
    </h4>
</div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Pilihan</th>
                    <th>Gedung Asrama</th>
                    <th>Jumlah (kg)</th>
                    <th>No Kamar</th>
                    <th>Total Harga</th>
                    <th>Catatan</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($products as $product)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->tanggal_pemesanan }}</td>
            <td>{{ $product->pilihan_kategori }}</td>
            <td>{{ $product->gedung_asrama }}</td>
            <td>{{ $product->jumlah_kg }}</td>
            <td>{{ $product->no_kamar }}</td>
            <td>{{ $product->total_harga}}</td>
            <td>{{ $product->catatan }}</td>
            <td>{{ $product->status_pembayaran }}</td>
            <td>
            <div class="d-flex justify-content-center">
    <!-- Tombol Edit -->
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm me-1">
        <i class="fa-solid fa-pen-to-square"></i> Edit
    </a>
    
    <!-- Tombol Hapus -->
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm me-1">
            <i class="fa-solid fa-trash"></i> Hapus
        </button>
    </form>
    
    <!-- Tombol Accepted -->
    <form action="{{ route('orders.accept', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-success btn-sm">
            <i class="fa-solid fa-check"></i> Accepted
        </button>
    </form>
</div>

                </div>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {!! $products->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
