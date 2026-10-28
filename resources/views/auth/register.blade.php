
@extends('layouts.app')

@section('title', 'Registrasi - EduEqual')
@section('auth-page', 'true')

@section('content')
<div class="login-page register-page">

    <!-- PANEL KIRI -->
    <section class="login-sidebar">
        <a href="{{ route('home') }}" class="brand">
            <i class="bi bi-stack"></i>
            <span>EduEqual</span>
        </a>

        <div class="sidebar-content">
            <div class="login-illustration">
                <div class="illustration-screen">
                    <i class="bi bi-people-fill"></i>
                    <div class="screen-lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <i class="bi bi-mortarboard-fill illustration-cap"></i>
                <i class="bi bi-book-half illustration-book"></i>
                <i class="bi bi-laptop illustration-laptop"></i>
            </div>

            <h1>Mulai Perjalanan Belajarmu</h1>

            <p class="sidebar-description">
                Bergabunglah dengan komunitas EduEqual dan ciptakan
                kesempatan pendidikan yang lebih setara untuk semua.
            </p>

            <p class="website">EduEqual — Belajar Tanpa Batas</p>
        </div>

        <div class="sidebar-decoration decoration-one"></div>
        <div class="sidebar-decoration decoration-two"></div>
    </section>

    <!-- PANEL KANAN -->
    <main class="login-main register-main">
        <div class="login-form-wrapper register-form-wrapper">

            <h2>Buat Akun</h2>

            <p class="login-subtitle">
                Daftar sekarang dan bergabung dengan komunitas EduEqual.
            </p>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <!-- NAMA LENGKAP -->
                <div class="register-field">
                    <label for="name" class="form-label">Nama lengkap</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control login-input @error('name') is-invalid @enderror"
                        placeholder="Masukkan nama lengkap"
                        autocomplete="name"
                        required
                    >

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div class="register-field">
                    <label for="email" class="form-label">Email</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control login-input @error('email') is-invalid @enderror"
                        placeholder="Masukkan alamat email"
                        autocomplete="email"
                        required
                    >

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- ROLE -->
                <div class="register-field">
                    <label for="role" class="form-label">Daftar sebagai</label>

                    <select
                        id="role"
                        name="role"
                        class="form-select login-input register-select @error('role') is-invalid @enderror"
                        required
                    >
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>
                            Pilih jenis akun
                        </option>

                        <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>
                            Siswa
                        </option>

                        <option value="tutor" {{ old('role') === 'tutor' ? 'selected' : '' }}>
                            Relawan pengajar
                        </option>
                    </select>

                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="register-field">
                    <label for="password" class="form-label">Password</label>

                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control login-input @error('password') is-invalid @enderror"
                            placeholder="Buat password"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            data-target="password"
                            aria-label="Tampilkan password"
                        >
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>

                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- KONFIRMASI PASSWORD -->
                <div class="register-field">
                    <label for="password_confirmation" class="form-label">
                        Konfirmasi password
                    </label>

                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control login-input"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            data-target="password_confirmation"
                            aria-label="Tampilkan konfirmasi password"
                        >
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- TOMBOL DAFTAR -->
                <button type="submit" class="btn-login register-submit">
                    Buat Akun
                    <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            <p class="register-text">
                Sudah punya akun?
                <a href="{{ route('login') }}">Login sekarang</a>
            </p>

            <p class="terms">
                Bergabunglah dengan <span>EduEqual</span> untuk mendukung
                pendidikan yang lebih setara.
            </p>

            <!-- DARK MODE -->
            <div class="dark-mode-control">
                <span><i class="bi bi-moon-stars"></i> Dark Mode</span>

                <label class="theme-switch">
                    <input type="checkbox" id="darkModeToggle">
                    <span class="switch-slider"></span>
                </label>
            </div>

        </div>
    </main>

</div>
@endsection

@push('scripts')
<script>
    // Tampilkan atau sembunyikan kedua kolom password
    document.querySelectorAll('.toggle-password').forEach(function (button) {
        button.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.target);
            const isPassword = input.type === 'password';

            input.type = isPassword ? 'text' : 'password';

            this.innerHTML = isPassword
                ? '<i class="bi bi-eye-slash"></i>'
                : '<i class="bi bi-eye"></i>';
        });
    });

    // Dark mode halaman registrasi
    const darkModeToggle = document.getElementById('darkModeToggle');

    darkModeToggle.addEventListener('change', function () {
        document.body.classList.toggle('dark-mode', this.checked);
    });
</script>
@endpush
