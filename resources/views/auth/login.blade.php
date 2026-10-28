@extends('layouts.app')

@section('title', 'Login - EduEqual')
@section('auth-page', 'true')

@section('content')
    <div class="login-page">

        <!-- PANEL KIRI -->
        <section class="login-sidebar">
            <a href="{{ url('/') }}" class="brand">
                <i class="bi bi-stack"></i>
                <span>EduEqual</span>
            </a>

            <div class="sidebar-content">
                <div class="login-illustration">
                    <div class="illustration-screen">
                        <i class="bi bi-play-circle"></i>
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

                <h1>Pendidikan untuk Semua</h1>

                <p class="sidebar-description">
                    Sistem informasi pendidikan yang membantu menciptakan
                    kesempatan belajar yang setara bagi setiap orang.
                </p>

                <p class="website">EduEqual — Belajar Tanpa Batas</p>
            </div>

            <div class="sidebar-decoration decoration-one"></div>
            <div class="sidebar-decoration decoration-two"></div>
        </section>

        <!-- PANEL KANAN -->
        <main class="login-main">
            <div class="login-form-wrapper">

                <h2>Log in</h2>

                <p class="login-subtitle">
                    Selamat datang kembali! Login ke akun EduEqual kamu.
                </p>

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>

                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            class="form-control login-input @error('email') is-invalid @enderror"
                            placeholder="Masukkan email kamu" autocomplete="email" required>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>

                        <div class="password-wrapper">
                            <input type="password" id="password" name="password"
                                class="form-control login-input @error('password') is-invalid @enderror"
                                placeholder="Masukkan password kamu" autocomplete="current-password" required>

                            <button type="button" class="toggle-password" id="togglePassword"
                                aria-label="Tampilkan password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>

                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="login-options">
                        <label class="remember-option">
                            <input type="checkbox" name="remember" value="1">
                            <span>Remember me</span>
                        </label>
                    </div>

                    <button type="submit" class="btn-login">
                        Login
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </form>

                <p class="register-text">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                </p>

                <p class="terms">
                    Dengan login, kamu dapat mengakses layanan
                    <span>EduEqual</span> untuk pendidikan yang lebih setara.
                </p>

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
        // Tampilkan atau sembunyikan password
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';

            this.innerHTML = isPassword ?
                '<i class="bi bi-eye-slash"></i>' :
                '<i class="bi bi-eye"></i>';
        });

        // Dark mode khusus halaman login
        const darkModeToggle = document.getElementById('darkModeToggle');

        darkModeToggle.addEventListener('change', function() {
            document.body.classList.toggle('dark-mode', this.checked);
        });
    </script>
@endpush
