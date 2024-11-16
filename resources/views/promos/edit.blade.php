@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm rounded">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fa-solid fa-pen-to-square"></i> Edit Promo</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5>Edit Detail Promo</h5>
                    <a class="btn btn-secondary btn-sm" href="{{ route('promos.index') }}">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('promos.update', $promo) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nama_promo" class="form-label">Nama Promo</label>
                        <input type="text" id="nama_promo" name="nama_promo" class="form-control" 
                            value="{{ old('nama_promo', $promo->nama_promo) }}" placeholder="Masukkan nama promo">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="diskon" class="form-label">Diskon (%)</label>
                                <input type="number" id="diskon" name="diskon" class="form-control" 
                                    value="{{ old('diskon', $promo->diskon) }}" min="0" max="100" placeholder="0-100%">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" 
                                    value="{{ old('tanggal_mulai', $promo->tanggal_mulai) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                                <input type="date" id="tanggal_berakhir" name="tanggal_berakhir" class="form-control" 
                                    value="{{ old('tanggal_berakhir', $promo->tanggal_berakhir) }}">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" 
                            placeholder="Deskripsi promo">{{ old('deskripsi', $promo->deskripsi) }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fa-solid fa-floppy-disk"></i> Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
