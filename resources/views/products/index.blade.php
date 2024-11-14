@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen Pemesanan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-outline-primary btn-sm mb-2" href="{{ route('products.create') }}"><i class="fa fa-plus"></i> Tambah Pemesanan</a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success" role="alert"> 
        {{ session('success') }}
    </div>
@endif
<style>
    .order-count {
        background-color: #c2def8;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>

<!-- Menampilkan jumlah pemesanan di atas tabel -->
<div class="mb-4 text-center order-count">
    <h4><strong>{{ $orderCount }} Orders</strong></h4>
</div>

<table class="table table-bordered">
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
    @foreach ($products as $product)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $product->tanggal_pemesanan }}</td>
        <td>{{ $product->pilihan_kategori }}</td>
        <td>{{ $product->gedung_asrama }}</td>
        <td>{{ $product->jumlah_kg }}</td>
        <td>{{ $product->no_kamar }}</td>
        <td>{{ $product->catatan }}</td>
        <td>
            <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}

@endsection