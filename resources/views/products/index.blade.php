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
            <div class="col-md-4 text-md-end">
            <a href="{{ route('products.printAll') }}" class="btn btn-warning btn-lg shadow-sm">
                <i class="fa-solid fa-print"></i> Cetak Semua Pembayaran
            </a>
            </div>
            

        </div>
    </div>
  

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mb-4 text-center py-3 bg-primary rounded shadow-sm border border-primary d-inline-block">
    <h4 class="fw-bold text-white">
        <i class="fa-solid fa-box me-2"></i>{{ $orderCountTotal }} Total Orders
    </h4>
</div>  
    <div class="mb-4 text-center py-3 bg-warning rounded shadow-sm border border-primary d-inline-block">
    <h4 class="fw-bold text-dark">
        <i class="fa-solid fa-list me-2"></i>{{ $orderCountPending }} Orders Pending
    </h4>
</div>


<div class="mb-4 text-center py-3 bg-success rounded shadow-sm border border-primary d-inline-block">
    <h4 class="fw-bold text-white">
        <i class="fa-solid fa-check me-2"></i>{{ $orderCountAccepted }} Orders Accepted
    </h4>
</div>
<div class="mb-4 text-center py-3 bg-danger rounded shadow-sm border border-primary d-inline-block">
    <h4 class="fw-bold text-white">
        <i class="fa-solid fa-times me-2"></i>{{ $orderCountRejected }} Orders Rejected
    </h4>
</div>
<form action="{{ route('products.index') }}" method="GET" class="mb-4 d-flex">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari data nama pemesanan..." value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary">
        <i class="fa-solid fa-search"></i> Cari
    </button>
</form>

    
    <form action="{{ route('products.index') }}" method="GET" class="mb-4">
        
    </form>

    @if($products->isEmpty())
        <div class="alert alert-warning text-center">
            <i class="fa-solid fa-exclamation-circle me-2"></i>Data not found
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Pilihan</th>
                    <th>Gedung Asrama</th>
                    <th>Jumlah (kg)</th>
                    <th>No Kamar</th>
                    <th>Total Harga</th>
                    <th>Catatan</th>
                    <th>Status Pembayaran</th>
                    <th>Alasan Reject</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($products as $product)
        <tr class="text-center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->nama }}</td>
            <td>{{ $product->tanggal_pemesanan }}</td>
            <td>{{ $product->pilihan_kategori }}</td>
            <td>{{ $product->gedung_asrama }}</td>
            <td>{{ $product->jumlah_kg }}</td>
            <td>{{ $product->no_kamar }}</td>
            <td>{{ $product->total_harga}}</td>
            <td>{{ $product->catatan }}</td>
            <td>
    <span class="badge 
        @if($product->status_pembayaran === 'Pending')
            bg-warning text-dark
        @elseif($product->status_pembayaran === 'Accepted')
            bg-success text-white
        @elseif($product->status_pembayaran === 'Rejected')
            bg-danger text-white
        @else
            bg-secondary text-white
        @endif
    ">
        {{ ucfirst($product->status_pembayaran) }}
    </span>
</td>
            <td>{{ $product->alasan_reject ?? '-' }}</td>
            <td>
    <div class="d-flex justify-content-center">
        <!-- Tombol Edit -->
@role('Admin')
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
@if($product->status_pembayaran !== 'Accepted' && $product->status_pembayaran !== 'Rejected')
<form action="{{ route('products.accept', $product->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-success btn-sm">
        <i class="fa-solid fa-check"></i> Accepted
    </button>
</form>
@endif


<!-- Tombol Rejected -->
@if($product->status_pembayaran !== 'Rejected' && $product->status_pembayaran !== 'Accepted')
<form action="{{ route('products.reject', $product->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('PUT')
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectReasonModal-{{ $product->id }}">
        <i class="fa-solid fa-times"></i> Reject
    </button>
</form>
@endrole
@endif


        <!-- Tombol Lihat Bukti Pembayaran -->
        <button class="btn btn-info btn-sm ms-1" data-bs-toggle="modal" data-bs-target="#paymentProofModal-{{ $product->id }}">
            <i class="fa-solid fa-image"></i> Lihat Bukti Pembayaran
        </button>
        <a href="{{ route('products.generateWordInvoice', $product->id) }}" class="btn btn-warning btn-sm ms-1">
                                <i class="fa-solid fa-print"></i> Cetak Pembayaran
                            </a>
    </div>
</td>

<!-- Modal Lihat Bukti Pembayaran -->
<div class="modal fade" id="paymentProofModal-{{ $product->id }}" tabindex="-1" aria-labelledby="paymentProofModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentProofModalLabel">Bukti Pembayaran - {{ $product->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Cek apakah ada bukti pembayaran -->
                @if($product->bukti_pembayaran)
                    <!-- Jika ada, tampilkan gambar -->
                    <img src="{{ asset('storage/'.$product->bukti_pembayaran) }}" alt="Bukti Pembayaran" class="img-fluid" style="max-width: 100%; height: auto;">
                @else
                    <p>No Payment Proof Available</p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Alasan Reject -->
<div class="modal fade" id="rejectReasonModal-{{ $product->id }}" tabindex="-1" aria-labelledby="rejectReasonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectReasonModalLabel">Alasan Reject - {{ $product->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.reject', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="alasan_reject" class="form-label">Alasan Penolakan</label>
                        <textarea name="alasan_reject" id="alasan_reject" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



        </tr>
    @endforeach
</tbody>

        </table>
    </div>
    
    <div class="d-flex justify-content-center mt-3">
        {!! $products->links('pagination::bootstrap-5') !!}
    </div>
    @endif
</div>
@endsection
