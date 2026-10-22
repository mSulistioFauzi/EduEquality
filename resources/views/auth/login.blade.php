
@extends('layouts.app')

@section('title', 'Login - EduEqual')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="fw-bold text-center mb-2">Selamat Datang</h3>
                <p class="text-secondary text-center mb-4">
                    Login ke akun EduEqual kamu
                </p>

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            required
                        >

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required
                        >

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100" type="submit">
                        Login
                    </button>
                </form>

                <p class="text-center mt-4 mb-0">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
