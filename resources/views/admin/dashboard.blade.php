
@extends('layouts.app')

@section('title', 'Dashboard Admin - EduEqual')

@section('content')
<div class="student-dashboard admin-dashboard">

    {{-- HEADER DASHBOARD --}}
    <div class="student-welcome">
        <div class="welcome-content">
            <span class="welcome-label"><i class="bi bi-shield-check"></i> Dashboard Admin</span>
            <h1>Halo, {{ auth()->user()->name }}!</h1>
            <p>Kelola layanan pendidikan EduEqual dan bantu menciptakan pengalaman belajar yang lebih setara untuk semua.</p>

            <a href="{{ route('admin.subjects.index') }}" class="student-primary-btn admin-primary-btn">
                <i class="bi bi-book-half"></i> Kelola Mata Pelajaran
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="welcome-illustration">
            <div class="welcome-circle">
                <i class="bi bi-person-workspace"></i>
            </div>
            <div class="floating-icon floating-book"><i class="bi bi-journal-check"></i></div>
            <div class="floating-icon floating-star"><i class="bi bi-bar-chart-fill"></i></div>
            <div class="floating-icon floating-person"><i class="bi bi-gear-fill"></i></div>
        </div>
    </div>

    {{-- MENU PENGELOLAAN --}}
    <div class="student-section-heading">
        <div>
            <h2>Pengelolaan EduEqual</h2>
            <p>Pilih bagian yang ingin kamu kelola.</p>
        </div>
    </div>

    <div class="admin-card-grid">

        <div class="admin-feature-card">
            <div class="admin-feature-top">
                <div class="step-icon step-icon-blue"><i class="bi bi-people-fill"></i></div>
                <span class="admin-feature-number">01</span>
            </div>
            <h3>Data Siswa</h3>
            <p>Kelola profil siswa yang terdaftar dan informasi akun mereka.</p>
            <span class="admin-status-badge admin-badge-blue">
                <i class="bi bi-clock"></i> Segera tersedia
            </span>
        </div>

        <div class="admin-feature-card">
            <div class="admin-feature-top">
                <div class="step-icon step-icon-orange"><i class="bi bi-shield-check"></i></div>
                <span class="admin-feature-number">02</span>
            </div>
            <h3>Verifikasi Relawan</h3>
            <p>Periksa profil dan kelayakan relawan pengajar sebelum disetujui.</p>
            <span class="admin-status-badge admin-badge-orange">
                <i class="bi bi-clock"></i> Segera tersedia
            </span>
        </div>

        <div class="admin-feature-card">
            <div class="admin-feature-top">
                <div class="step-icon step-icon-purple"><i class="bi bi-clipboard-check"></i></div>
                <span class="admin-feature-number">03</span>
            </div>
            <h3>Pengajuan Belajar</h3>
            <p>Tinjau permintaan bantuan belajar yang diajukan oleh siswa.</p>
            <span class="admin-status-badge admin-badge-purple">
                <i class="bi bi-clock"></i> Segera tersedia
            </span>
        </div>

    </div>

    {{-- INFORMASI TAMBAHAN --}}
    <div class="student-info-card">
        <div class="student-info-icon"><i class="bi bi-lightbulb"></i></div>
        <div>
            <h3>Kelola pendidikan dengan lebih mudah</h3>
            <p>Gunakan dashboard ini untuk mengelola mata pelajaran dan mendukung layanan pendidikan yang aman, teratur, dan mudah diakses.</p>
        </div>
    </div>

</div>
@endsection
