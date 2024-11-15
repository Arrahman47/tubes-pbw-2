@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-8">
            <h2 class="text-primary fw-bold"><i class="fa-solid fa-box me-2"></i>Manajemen Pemesanan</h2>
            <p class="text-muted">Kelola semua pemesanan yang telah dibuat dengan mudah.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('products.create') }}" class="btn btn-success btn-lg shadow-sm">
                <i class="fa fa-plus me-2"></i>Tambah Pemesanan
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Menampilkan jumlah pemesanan -->
    <div class="mb-4 text-center py-3 bg-light rounded shadow-sm">
        <h4 class="fw-bold text-primary"><i class="fa-solid fa-list me-2"></i>{{ $orderCount }} Orders</h4>
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
                    <th>Catatan</th>
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
                        <td>{{ $product->catatan }}</td>
                        <!-- <td>
                            @if($product->status_pembayaran === 'belum_bayar')
                                <form action="{{ route('orders.pay', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm shadow-sm">
                                        <i class="fa-solid fa-credit-card"></i> Bayar
                                    </button>
                                </form>
                            @else
                                <span class="badge bg-success">
                                    <i class="fa-solid fa-check"></i> Lunas
                                </span>
                            @endif
                        </td> -->
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
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
