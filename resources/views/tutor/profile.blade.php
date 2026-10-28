
@extends('layouts.app')

@section('title', 'Profil Tutor - EduEqual')

@section('content')
<div class="student-dashboard tutor-profile-page">

    {{-- HEADER PROFIL --}}
    <div class="student-welcome profile-welcome">
        <div class="welcome-content">
            <span class="welcome-label">
                <i class="bi bi-person-vcard"></i>
                Profil Relawan
            </span>

            <h1>Profil Tutor</h1>
            <p>
                Lengkapi biodata, ceritakan pengalaman mengajarmu, dan
                pilih mata pelajaran yang kamu kuasai untuk membantu
                siswa belajar bersama EduEqual.
            </p>

            <a href="{{ route('tutor.dashboard') }}" class="student-primary-btn profile-back-top">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>

        <div class="welcome-illustration">
            <div class="welcome-circle">
                <i class="bi bi-person-workspace"></i>
            </div>
            <div class="floating-icon floating-book">
                <i class="bi bi-book-fill"></i>
            </div>
            <div class="floating-icon floating-star">
                <i class="bi bi-stars"></i>
            </div>
            <div class="floating-icon floating-person">
                <i class="bi bi-person-check-fill"></i>
            </div>
        </div>
    </div>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="profile-notice profile-notice-success">
            <i class="bi bi-check-circle-fill"></i>
            <div>{{ session('success') }}</div>
        </div>
    @endif

    @if ($errors->any())
        <div class="profile-notice profile-notice-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <div>
                <strong>Profil belum berhasil disimpan.</strong>
                <p class="mb-0">Periksa kembali data yang kamu masukkan.</p>
            </div>
        </div>
    @endif

    {{-- STATUS VERIFIKASI --}}
    <div class="student-section-heading">
        <div>
            <h2>Status Verifikasi</h2>
            <p>Informasi mengenai status profil relawan kamu.</p>
        </div>
    </div>

    <div class="profile-verification-card">
        @if ($profile->verification_status === 'approved')
            <div class="profile-status-icon profile-status-approved">
                <i class="bi bi-patch-check-fill"></i>
            </div>

            <div class="profile-status-content">
                <span class="profile-status-caption">Status akun tutor</span>
                <h3>Profil Terverifikasi</h3>
                <p>
                    Profil kamu sudah disetujui oleh admin.
                    Terima kasih telah menjadi bagian dari EduEqual.
                </p>
            </div>

            <span class="profile-status-badge profile-badge-approved">
                <i class="bi bi-check-circle-fill"></i> Disetujui
            </span>
        @elseif ($profile->verification_status === 'rejected')
            <div class="profile-status-icon profile-status-rejected">
                <i class="bi bi-x-circle-fill"></i>
            </div>

            <div class="profile-status-content">
                <span class="profile-status-caption">Status akun tutor</span>
                <h3>Profil Belum Disetujui</h3>
                <p>
                    Profil kamu belum disetujui oleh admin.
                    Periksa kembali informasi profil dan lengkapi data yang diperlukan.
                </p>
            </div>

            <span class="profile-status-badge profile-badge-rejected">
                <i class="bi bi-x-circle-fill"></i> Ditolak
            </span>
        @else
            <div class="profile-status-icon profile-status-pending">
                <i class="bi bi-clock-history"></i>
            </div>

            <div class="profile-status-content">
                <span class="profile-status-caption">Status akun tutor</span>
                <h3>Menunggu Verifikasi</h3>
                <p>
                    Kamu masih dapat melengkapi profil.
                    Tutor baru dapat menerima penugasan setelah diverifikasi admin.
                </p>
            </div>

            <span class="profile-status-badge profile-badge-pending">
                <i class="bi bi-hourglass-split"></i> Menunggu
            </span>
        @endif
    </div>

    {{-- FORM PROFIL --}}
    <div class="student-section-heading profile-form-heading">
        <div>
            <h2>Informasi Profil</h2>
            <p>Pastikan informasi yang kamu berikan sudah benar.</p>
        </div>
    </div>

    <div class="profile-form-card">
        <div class="profile-form-header">
            <div class="profile-form-header-icon">
                <i class="bi bi-person-lines-fill"></i>
            </div>
            <div>
                <h3>Biodata Relawan</h3>
                <p>Informasi dasar dan pengalaman mengajarmu.</p>
            </div>
        </div>

        <form action="{{ route('tutor.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NAMA --}}
            <div class="profile-form-group">
                <label for="name" class="profile-form-label">
                    Nama Lengkap <span>*</span>
                </label>

                <div class="profile-input-wrapper">
                    <i class="bi bi-person"></i>
                    <input type="text" id="name" name="name"
                           class="form-control profile-input @error('name') is-invalid @enderror"
                           value="{{ old('name', $user->name) }}"
                           placeholder="Masukkan nama lengkap" required>
                </div>

                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div class="profile-form-group">
                <label for="email" class="profile-form-label">Alamat Email</label>

                <div class="profile-input-wrapper">
                    <i class="bi bi-envelope"></i>
                    <input type="email" id="email" class="form-control profile-input"
                           value="{{ $user->email }}" disabled>
                </div>

                <small class="profile-field-help">
                    <i class="bi bi-info-circle"></i>
                    Email tidak dapat diubah dari halaman ini.
                </small>
            </div>

            {{-- BIODATA --}}
            <div class="profile-form-group">
                <label for="bio" class="profile-form-label">
                    Biodata dan Pengalaman
                </label>

                <textarea id="bio" name="bio" rows="5" maxlength="1000"
                          class="form-control profile-textarea @error('bio') is-invalid @enderror"
                          placeholder="Ceritakan pengalaman, pendidikan, keahlian, atau cara mengajar kamu...">{{ old('bio', $profile->bio) }}</textarea>

                <div class="profile-field-footer">
                    <small class="profile-field-help">
                        Ceritakan hal yang dapat membantu siswa mengenalmu.
                    </small>
                    <small class="profile-field-help">Maks. 1000 karakter</small>
                </div>

                @error('bio')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- MATA PELAJARAN --}}
            <div class="profile-subject-section">
                <div class="profile-subject-heading">
                    <div class="profile-form-header-icon">
                        <i class="bi bi-journal-bookmark"></i>
                    </div>
                    <div>
                        <h3>Mata Pelajaran</h3>
                        <p>Pilih satu atau lebih mata pelajaran yang kamu kuasai.</p>
                    </div>
                </div>

                @php
                    $selectedSubjects = old(
                        'subject_ids',
                        $profile->subjects->pluck('id')->toArray()
                    );
                @endphp

                @if ($subjects->isEmpty())
                    <div class="profile-empty-subjects">
                        <i class="bi bi-journal-x"></i>
                        <h4>Belum Ada Mata Pelajaran</h4>
                        <p>
                            Hubungi admin untuk menambahkan mata pelajaran
                            yang tersedia di EduEqual.
                        </p>
                    </div>
                @else
                    <div class="profile-subject-grid">
                        @foreach ($subjects as $subject)
                            <label class="profile-subject-option"
                                   for="subject_{{ $subject->id }}">
                                <input class="profile-subject-checkbox"
                                       type="checkbox"
                                       name="subject_ids[]"
                                       value="{{ $subject->id }}"
                                       id="subject_{{ $subject->id }}"
                                       @checked(in_array($subject->id, $selectedSubjects))>

                                <span class="profile-custom-checkbox">
                                    <i class="bi bi-check2"></i>
                                </span>

                                <span class="profile-subject-name">
                                    {{ $subject->nama }}
                                </span>

                                <i class="bi bi-book profile-subject-icon"></i>
                            </label>
                        @endforeach
                    </div>
                @endif

                @error('subject_ids')
                    <div class="text-danger small mt-3">{{ $message }}</div>
                @enderror

                @error('subject_ids.*')
                    <div class="text-danger small mt-2">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="profile-form-actions">
                <button type="submit" class="profile-save-btn"
                        {{ $subjects->isEmpty() ? 'disabled' : '' }}>
                    <i class="bi bi-check2-circle"></i>
                    Simpan Profil
                </button>

                <a href="{{ route('tutor.dashboard') }}" class="profile-cancel-btn">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </form>
    </div>
    <div class="student-info-card profile-bottom-info">
        <div class="student-info-icon">
            <i class="bi bi-lightbulb"></i>
        </div>
        <div>
            <h3>Profil yang lengkap membantu siswa</h3>
            <p>
                Biodata dan mata pelajaran yang jelas membantu memberikan
                gambaran tentang keahlianmu sebagai relawan pengajar.
            </p>
        </div>
    </div>

</div>
@endsection
