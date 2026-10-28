
@extends('layouts.app')

@section('title', 'Dashboard Relawan - EduEqual')

@section('content')
<div class="student-dashboard tutor-dashboard">

    {{-- HEADER DASHBOARD --}}
    <div class="student-welcome">
        <div class="welcome-content">
            <span class="welcome-label"><i class="bi bi-people-fill"></i> Dashboard Relawan</span>
            <h1>Halo, {{ auth()->user()->name }}!</h1>
            <p>Terima kasih sudah bergabung dan membantu memperluas akses pendidikan melalui EduEqual.</p>

            <a href="{{ route('tutor.profile.edit') }}" class="student-primary-btn tutor-primary-btn">
                <i class="bi bi-person-vcard"></i> Lengkapi Profil Tutor
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="welcome-illustration">
            <div class="welcome-circle">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div class="floating-icon floating-book"><i class="bi bi-book-fill"></i></div>
            <div class="floating-icon floating-star"><i class="bi bi-people-fill"></i></div>
            <div class="floating-icon floating-person"><i class="bi bi-person-video3"></i></div>
        </div>
    </div>

    {{-- STATUS VERIFIKASI --}}
    <div class="tutor-status-card">
        @if (auth()->user()->tutorProfile?->verification_status === 'approved')
            <div class="tutor-status-icon status-approved">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="tutor-status-content">
                <span class="tutor-status-label">Status Profil</span>
                <h3>Profil Terverifikasi</h3>
                <p>Profil kamu sudah diverifikasi. Kamu dapat melanjutkan ke pengelolaan keahlian dan jadwal belajar.</p>
            </div>
            <span class="tutor-status-badge approved-badge">Disetujui</span>
        @else
            <div class="tutor-status-icon status-pending">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="tutor-status-content">
                <span class="tutor-status-label">Status Profil</span>
                <h3>Menunggu Verifikasi</h3>
                <p>Profil kamu masih menunggu verifikasi admin. Kamu belum dapat menerima penugasan sampai disetujui.</p>
            </div>
            <span class="tutor-status-badge pending-badge">Menunggu</span>
        @endif
    </div>

    {{-- LANGKAH BERIKUTNYA --}}
    <div class="student-section-heading">
        <div>
            <h2>Langkah berikutnya</h2>
            <p>Persiapkan dirimu untuk membantu siswa belajar.</p>
        </div>
    </div>

    <div class="student-step-grid">
        <div class="student-step-card">
            <div class="step-icon step-icon-blue"><i class="bi bi-person-vcard"></i></div>
            <span class="step-number">LANGKAH 01</span>
            <h3>Lengkapi Profil</h3>
            <p>Lengkapi informasi profil relawan agar admin dapat melakukan verifikasi.</p>
        </div>

        <div class="student-step-card">
            <div class="step-icon step-icon-green"><i class="bi bi-journal-bookmark"></i></div>
            <span class="step-number">LANGKAH 02</span>
            <h3>Pilih Keahlian</h3>
            <p>Tentukan mata pelajaran yang kamu kuasai dan siap ajarkan kepada siswa.</p>
        </div>

        <div class="student-step-card">
            <div class="step-icon step-icon-orange"><i class="bi bi-clock"></i></div>
            <span class="step-number">LANGKAH 03</span>
            <h3>Atur Ketersediaan</h3>
            <p>Tentukan waktu yang tersedia untuk mengadakan sesi belajar.</p>
        </div>

        <div class="student-step-card">
            <div class="step-icon step-icon-purple"><i class="bi bi-calendar-check"></i></div>
            <span class="step-number">LANGKAH 04</span>
            <h3>Pantau Penugasan</h3>
            <p>Pantau jadwal dan penugasan setelah tersedia untuk akun relawanmu.</p>
        </div>
    </div>

    {{-- INFORMASI --}}
    <div class="student-info-card">
        <div class="student-info-icon"><i class="bi bi-lightbulb"></i></div>
        <div>
            <h3>Berbagi ilmu, membuka kesempatan</h3>
            <p>Setiap relawan memiliki peran penting dalam membantu siswa memperoleh kesempatan belajar yang lebih setara melalui EduEqual.</p>
        </div>
    </div>

</div>
@endsection
