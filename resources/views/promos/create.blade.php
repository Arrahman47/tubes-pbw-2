@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create new promo</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('promos.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama_promo">Nama Promo:</label>
        <input type="text" name="nama_promo" id="nama_promo" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="diskon">Diskon (%):</label>
        <input type="number" name="diskon" id="diskon" class="form-control" min="0" max="100">
    </div>
    <div class="form-group">
        <label for="tanggal_mulai">Tanggal mulai:</label>
        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" min="0" max="100">
    </div>
    <div class="form-group">
        <label for="tanggal_berakhir">Tanggal berakhir:</label>
        <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" min="0" max="100">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>



@endsection