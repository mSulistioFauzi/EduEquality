
@extends('layouts.app')

@section('title', 'Dashboard Relawan - EduEqual')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <span class="badge text-bg-success mb-3">
            Dashboard Relawan
        </span>

        <h2 class="fw-bold">
            Halo, {{ auth()->user()->name }}!
        </h2>

        <p class="text-secondary">
            Terima kasih sudah bergabung dan membantu memperluas
            akses pendidikan melalui EduEqual.
        </p>

        <hr>

        @if (auth()->user()->tutorProfile?->verification_status === 'approved')
            <div class="alert alert-success">
                Profil kamu sudah diverifikasi. Kamu dapat melanjutkan
                ke pengelolaan keahlian dan jadwal belajar.
            </div>
        @else
            <div class="alert alert-warning">
                Profil kamu masih menunggu verifikasi admin.
                Kamu belum dapat menerima penugasan sampai disetujui.
            </div>
        @endif

        <h5>Langkah berikutnya</h5>
        <ul class="text-secondary">
            <li>Lengkapi informasi profil relawan.</li>
            <li>Pilih mata pelajaran yang dikuasai.</li>
            <li>Tentukan ketersediaan waktu.</li>
            <li>Pantau penugasan dan jadwal belajar.</li>
        </ul>
    </div>
</div>
@endsection
