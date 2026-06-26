@extends('layouts.guest')

@section('title', 'Login')

@section('content')
    <h5 class="card-title fw-bold mb-4">Masuk ke Akun</h5>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
            <label class="form-check-label" for="remember_me">Ingat saya</label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none small">
                    Lupa password?
                </a>
            @endif
            <button type="submit" class="btn btn-dark px-4">
                <i class="bi bi-box-arrow-in-right me-1"></i>Masuk
            </button>
        </div>

        <hr class="my-3">
        <p class="text-center mb-0 small">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Daftar sekarang</a>
        </p>
    </form>
@endsection
