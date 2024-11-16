@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Pemesanan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                <input type="date" name="tanggal_pemesanan" class="form-control" value="{{ old('tanggal_pemesanan', $product->tanggal_pemesanan) }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="pilihan_kategori">Pilihan Kategori</label>
                <select id="pilihan_kategori" name="pilihan_kategori" class="form-select">
                    <option value="Komplit" {{ $product->pilihan_kategori == 'Komplit' ? 'selected' : '' }}>Komplit</option>
                    <option value="Setrika" {{ $product->pilihan_kategori == 'Setrika' ? 'selected' : '' }}>Setrika</option>
                    <option value="Cuci Kering" {{ $product->pilihan_kategori == 'Cuci Kering' ? 'selected' : '' }}>Cuci Kering</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="gedung_asrama">Gedung Asrama</label>
                <input type="text" name="gedung_asrama" class="form-control" value="{{ old('gedung_asrama', $product->gedung_asrama) }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="jumlah_kg">Jumlah (kg)</label>
                <input type="number" name="jumlah_kg" class="form-control" value="{{ old('jumlah_kg', $product->jumlah_kg) }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="no_kamar">No Kamar</label>
                <input type="number" name="no_kamar" class="form-control" value="{{ old('no_kamar', $product->no_kamar) }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <input type="text" name="catatan" class="form-control" value="{{ old('catatan', $product->catatan) }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary btn-sm mb-2 mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>

@endsection
