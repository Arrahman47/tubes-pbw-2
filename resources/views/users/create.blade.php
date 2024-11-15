@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-lg mt-4 rounded-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-4 p-3">
                <h4 class="mb-0"><i class="fa fa-user-plus"></i> Tambah User</h4>
                <a href="{{ route('users.index') }}" class="btn btn-light btn-sm rounded-3"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="mb-2"><strong>Name</strong></label>
                                <input type="text" id="name" name="name" placeholder="Enter user name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" style="border-radius: 30px;">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="mb-2"><strong>Email</strong></label>
                                <input type="email" id="email" name="email" placeholder="Enter email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" style="border-radius: 30px;">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="password" class="mb-2"><strong>Password</strong></label>
                                <input type="password" id="password" name="password" placeholder="Enter password" class="form-control @error('password') is-invalid @enderror" style="border-radius: 30px;">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm-password" class="mb-2"><strong>Confirm Password</strong></label>
                                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm password" class="form-control @error('confirm-password') is-invalid @enderror" style="border-radius: 30px;">
                                @error('confirm-password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="roles" class="mb-2"><strong>Role</strong></label>
                                <select name="roles[]" id="roles" class="form-control @error('roles') is-invalid @enderror" multiple="multiple" style="border-radius: 30px;">
                                    @foreach ($roles as $value => $label)
                                        <option value="{{ $value }}">
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('roles')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-success btn-lg px-5 py-3 rounded-pill shadow-lg" style="transition: all 0.3s ease-in-out;">
                                <i class="fa-solid fa-floppy-disk"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
