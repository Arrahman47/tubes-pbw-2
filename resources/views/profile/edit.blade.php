@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Profile</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="confirm-password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
    </form>

    <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
</div>
@endsection
