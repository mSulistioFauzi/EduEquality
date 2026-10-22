
@extends('layouts.app')

@section('title', 'Registrasi - EduEqual')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="fw-bold text-center mb-2">Buat Akun</h3>
                <p class="text-secondary text-center mb-4">
                    Bergabung dengan komunitas EduEqual
                </p>

                <form action="{{ route('register.process') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama lengkap</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror"
                            required
                        >

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

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
                        <label class="form-label">Daftar sebagai</label>
                        <select
                            name="role"
                            class="form-select @error('role') is-invalid @enderror"
                            required
                        >
                            <option value="">Pilih jenis akun</option>
                            <option value="student"
                                {{ old('role') === 'student' ? 'selected' : '' }}>
                                Siswa
                            </option>
                            <option value="tutor"
                                {{ old('role') === 'tutor' ? 'selected' : '' }}>
                                Relawan pengajar
                            </option>
                        </select>

                        @error('role')
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

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                        >
                    </div>

                    <button class="btn btn-primary w-100" type="submit">
                        Buat Akun
                    </button>
                </form>

                <p class="text-center mt-4 mb-0">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
