@extends('layouts.app')

@section('content')
<div class="container mt-1">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg fade-in">
                <div class="card-header text-center text-white fs-4" style="background-color: #c2def8;">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Email Address Field -->
                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div class="mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Profile Picture Upload Field -->
                        <div class="mb-4">
                            @error('profile_picture')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Ingatkan Saya') }}
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button and Forgot Password Link -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
    <a href="{{ url('auth/redirect') }}" class="btn-google d-flex align-items-center">
        <img src="{{ asset('images/google.png') }}" alt="Google Logo" style="width: 24px; height: 24px; margin-right: 10px;">
        Login with Google
    </a>
</div>

                        <div class="mt-3 text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
     .btn-google {
        background-color: white; /* White background */
        color: black; /* Black text */
        border: 2px solid black; /* Black border (stroke) */
        display: flex;
        align-items: center;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        width: fit-content;
    }

    .btn-google img {
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }

    .btn-google:hover {
        background-color: #f8f9fa; /* Slightly gray background on hover */
        border-color: #343a40; /* Darker border color on hover */
    }
    /* Keyframes for Fade-In Animation */
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }

    /* Apply Fade-In Animation to Form */
    .fade-in {
        animation: fadeIn 1s ease-out;
    }

    /* Card Styling */
    .card {
        transform: scale(0.95);
        opacity: 0;
        animation: scaleUp 1s ease-out forwards;
    }

    /* Scale-Up Animation for Card */
    @keyframes scaleUp {
        0% {
            transform: scale(0.95);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* Add Shadow Effect */
    .card:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        transition: box-shadow 0.3s ease-in-out;
    }

    /* Styling for Form Input */
    .form-control {
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }
</style>
