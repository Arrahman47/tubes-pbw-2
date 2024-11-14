@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Promo</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-outline-primary btn-sm mb-2" href="{{ route('promos.create') }}"><i class="fa fa-plus"></i> Tambah Promo</a>
        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert"> 
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
  <tr>
     <th width="100px">No</th>
     <th>Nama Promo</th>
     <th>Deskripsi</th>
     <th>Diskon (%)</th>
     <th>Tanggal mulai</th>
     <th>Tanggal berakhir</th>
     <th width="280px">Aksi</th>
  </tr>
    @foreach ($promos as $promo)
    <tr>
        <td>{{ $loop->iteration }}</td>  <!-- Use $loop->iteration for the row number -->
        <td>{{ $promo->nama_promo}}</td>
        <td>{{ $promo->deskripsi }}</td>
        <td>{{ $promo->diskon }}</td>
        <td>{{ $promo->tanggal_mulai }}</td>
        <td>{{ $promo->tanggal_berakhir }}</td>
        <td>
            
            <a class="btn btn-primary btn-sm" href="{{ route('promos.edit', $promo->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            <form method="POST" action="{{ route('promos.destroy', $promo->id) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $promos->links('pagination::bootstrap-5') !!}

@endsection
