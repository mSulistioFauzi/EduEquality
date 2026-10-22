
@extends('layouts.app')

@section('title', 'Dashboard Admin - EduEqual')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">Dashboard Admin</h2>
    <p class="text-secondary">
        Selamat datang, {{ auth()->user()->name }}.
        Kelola layanan pendidikan melalui halaman ini.
    </p>
</div>

<div class="row g-3">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5>Data Siswa</h5>
                <p class="text-secondary">
                    Kelola profil siswa yang terdaftar.
                </p>
                <span class="badge text-bg-primary">Segera tersedia</span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5>Verifikasi Relawan</h5>
                <p class="text-secondary">
                    Periksa profil dan kelayakan relawan pengajar.
                </p>
                <span class="badge text-bg-warning">Segera tersedia</span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <h5>Pengajuan Belajar</h5>
                <p class="text-secondary">
                    Tinjau permintaan bantuan belajar siswa.
                </p>
                <span class="badge text-bg-info">Segera tersedia</span>
            </div>
        </div>
    </div>
</div>
@endsection
