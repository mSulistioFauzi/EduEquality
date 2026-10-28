
@extends('layouts.app')

@section('title', 'Dashboard Siswa - EduEqual')

@section('content')
<div class="student-dashboard">

    {{-- HEADER DASHBOARD --}}
    <div class="student-welcome">
        <div class="welcome-content">
            <span class="welcome-label">
                <i class="bi bi-mortarboard-fill"></i>
                Dashboard Siswa
            </span>

            <h1>Halo, {{ auth()->user()->name }}!</h1>

            <p>
                Selamat datang di EduEqual. Kamu bisa mendapatkan bantuan
                belajar gratis melalui relawan pengajar. Yuk, mulai perjalanan
                belajarmu bersama kami!
            </p>

            <button class="student-primary-btn" type="button" disabled>
                <i class="bi bi-book-half"></i>
                Ajukan Bantuan Belajar
            </button>

            <small>
                <i class="bi bi-info-circle"></i>
                Fitur pengajuan akan tersedia pada tahap berikutnya.
            </small>
        </div>

        <div class="welcome-illustration">
            <div class="welcome-circle">
                <i class="bi bi-mortarboard-fill"></i>
            </div>

            <div class="floating-icon floating-book">
                <i class="bi bi-book-fill"></i>
            </div>

            <div class="floating-icon floating-star">
                <i class="bi bi-stars"></i>
            </div>

            <div class="floating-icon floating-person">
                <i class="bi bi-person-video3"></i>
            </div>
        </div>
    </div>

    {{-- LANGKAH BERIKUTNYA --}}
    <div class="student-section-heading">
        <div>
            <h2>Langkah berikutnya</h2>
            <p>Persiapkan kebutuhan belajarmu melalui langkah sederhana berikut.</p>
        </div>
    </div>

    <div class="student-step-grid">

        <div class="student-step-card">
            <div class="step-icon step-icon-blue">
                <i class="bi bi-person-vcard"></i>
            </div>

            <span class="step-number">LANGKAH 01</span>
            <h3>Lengkapi Profil</h3>
            <p>
                Lengkapi informasi profil belajar kamu agar kebutuhan
                belajarmu dapat dikenali dengan lebih baik.
            </p>
        </div>

        <div class="student-step-card">
            <div class="step-icon step-icon-green">
                <i class="bi bi-journal-bookmark"></i>
            </div>

            <span class="step-number">LANGKAH 02</span>
            <h3>Pilih Mata Pelajaran</h3>
            <p>
                Tentukan mata pelajaran yang ingin kamu pelajari
                bersama relawan pengajar.
            </p>
        </div>

        <div class="student-step-card">
            <div class="step-icon step-icon-orange">
                <i class="bi bi-send"></i>
            </div>

            <span class="step-number">LANGKAH 03</span>
            <h3>Ajukan Permintaan</h3>
            <p>
                Ajukan permintaan bantuan belajar ketika fitur
                pengajuan sudah tersedia.
            </p>
        </div>

        <div class="student-step-card">
            <div class="step-icon step-icon-purple">
                <i class="bi bi-calendar-check"></i>
            </div>

            <span class="step-number">LANGKAH 04</span>
            <h3>Pantau Jadwal</h3>
            <p>
                Pantau status pengajuan dan jadwal sesi belajar
                setelah fitur tersebut tersedia.
            </p>
        </div>

    </div>

    {{-- INFORMASI TAMBAHAN --}}
    <div class="student-info-card">
        <div class="student-info-icon">
            <i class="bi bi-lightbulb"></i>
        </div>

        <div>
            <h3>Belajar bersama, tumbuh bersama</h3>
            <p>
                EduEqual hadir untuk membantu setiap siswa mendapatkan
                kesempatan belajar yang lebih setara melalui dukungan
                relawan pengajar.
            </p>
        </div>
    </div>

</div>
@endsection
