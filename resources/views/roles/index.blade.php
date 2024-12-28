@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2 class="text-primary fw-bold"><i class="fa-solid fa-user-shield me-2"></i>Manajemen Role</h2>
            <p class="text-muted">Kelola daftar role pengguna untuk sistem dengan mudah.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('roles.create') }}" class="btn btn-success btn-lg shadow-sm">
                <i class="fa fa-plus me-2"></i>Tambah Role
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr class="text-center">
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm me-1">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
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
        {!! $roles->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection
