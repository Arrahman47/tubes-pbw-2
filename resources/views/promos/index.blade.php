@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-3 align-items-center">
        <div class="col-md-8">
            <h2 class="text-primary fw-bold"><i class="fa-solid fa-tags me-2"></i>Manajemen Promo</h2>
            <p class="text-muted">Kelola semua promo yang tersedia untuk pelanggan Anda.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('promos.create') }}" class="btn btn-success btn-lg shadow-sm">
                <i class="fa fa-plus me-2"></i>Tambah Promo
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive shadow rounded">
        <table class="table table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th width="80px">No</th>
                    <th>Nama Promo</th>
                    <th>Deskripsi</th>
                    <th>Diskon (%)</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th width="200px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($promos as $promo)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-start fw-semibold">{{ $promo->nama_promo }}</td>
                        <td class="text-start text-muted">{{ $promo->deskripsi }}</td>
                        <td><span class="badge bg-success">{{ $promo->diskon }}%</span></td>
                        <td>{{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($promo->tanggal_berakhir)->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('promos.edit', $promo->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('promos.destroy', $promo->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {!! $promos->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
