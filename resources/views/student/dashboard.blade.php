
@extends('layouts.app')

@section('title', 'Dashboard Siswa - EduEqual')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <span class="badge text-bg-primary mb-3">Dashboard Siswa</span>

        <h2 class="fw-bold">
            Halo, {{ auth()->user()->name }}!
        </h2>

        <p class="text-secondary">
            Selamat datang di EduEqual. Kamu bisa mendapatkan bantuan
            belajar gratis melalui relawan pengajar.
        </p>

        <hr>

        <h5>Langkah berikutnya</h5>
        <ul class="text-secondary">
            <li>Lengkapi profil belajar kamu.</li>
            <li>Pilih mata pelajaran yang membutuhkan bantuan.</li>
            <li>Ajukan permintaan belajar.</li>
            <li>Pantau status pengajuan dan jadwal sesi.</li>
        </ul>

        <button class="btn btn-primary" disabled>
            Ajukan Bantuan Belajar
        </button>

        <small class="d-block text-secondary mt-2">
            Fitur pengajuan akan dibuat pada tahap berikutnya.
        </small>
    </div>
</div>
@endsection
