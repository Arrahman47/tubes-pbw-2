@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Pemesanan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
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

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pemesanan</strong>
                <input type="date" name="name" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <label for="pilihan" class="form-label required">Pilihan Kategori</label>
                <select id="pilihan" name="pilihan" class="form-select" required>
                    <option selected>Pilihan Kategori</option>
                    <option value="Kiloan">Kiloan</option>
                    <option value="Satuan">Satuan</option>
                    <option value="Cuci Kering">Cuci Kering</option>
                </select>
                <div class="mb-3">
                <label for="gedung_asrama" class="form-label required">Gedung Asrama</label>
                <input type="text" id="gedung_asrama" name="gedung_asrama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label required">Jumlah (kg)</label>
                <input type="text" id="jumlah" name="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="no_kamar" class="form-label required">No Kamar</label>
                <input type="number" id="no_kamar" name="no_kamar" class="form-control" required>
            </div>
</div>
</div>
    </select>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Catatan</strong>
                <textarea class="form-control" name="detail" placeholder="Catatan"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary btn-sm mb-3 mt-2"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
    </div>
</form>


@endsection