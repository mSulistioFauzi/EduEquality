@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran - EduEqual')

@section('content')
<div class="subjects-page">
    <div class="subjects-page-heading">
        <a href="{{ route('admin.subjects.index') }}" class="subjects-back-link">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Mata Pelajaran
        </a>

        <div class="subjects-heading-icon">
            <i class="bi bi-journal-plus"></i>
        </div>
        <h2>Tambah Mata Pelajaran</h2>
        <p>Tambahkan mata pelajaran baru untuk mendukung kegiatan belajar di EduEqual.</p>
    </div>

    @if(session('success'))
        <div class="subjects-alert subjects-alert-success">
            <i class="bi bi-check-circle-fill"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="subjects-alert subjects-alert-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="subjects-alert subjects-alert-error">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div>
                <strong>Periksa kembali data yang dimasukkan.</strong>
                <ul class="mb-0 mt-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="subjects-form-card">
        <div class="subjects-form-header">
            <div class="subjects-form-header-icon">
                <i class="bi bi-pencil-square"></i>
            </div>
            <div>
                <h5>Informasi Mata Pelajaran</h5>
                <p>Isi informasi berikut dengan benar.</p>
            </div>
        </div>

        <form action="{{ route('admin.subjects.store') }}" method="POST">
            @csrf

            <div class="subjects-form-body">
                <div class="subjects-field">
                    <label for="nama" class="subjects-form-label">
                        Nama Mata Pelajaran <span>*</span>
                    </label>
                    <input type="text" name="nama" id="nama" class="form-control subjects-input @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Contoh: Matematika" maxlength="100" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="subjects-field-help">Masukkan nama mata pelajaran, maksimal 100 karakter.</small>
                </div>

                <div class="subjects-field">
                    <label for="deskripsi" class="subjects-form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" maxlength="1000" class="form-control subjects-input subjects-textarea @error('deskripsi') is-invalid @enderror" placeholder="Jelaskan materi atau kemampuan yang dipelajari dalam mata pelajaran ini.">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="subjects-field-help">Deskripsi bersifat opsional, maksimal 1.000 karakter.</small>
                </div>
            </div>

            <div class="subjects-form-footer">
                <a href="{{ route('admin.subjects.index') }}" class="subjects-secondary-btn">
                    Batal
                </a>
                <button type="submit" class="subjects-primary-btn">
                    <i class="bi bi-check-lg"></i>
                    Simpan Mata Pelajaran
                </button>
            </div>
        </form>
    </div>

    <div class="subjects-form-tip">
        <i class="bi bi-lightbulb"></i>
        <div>
            <strong>Tips</strong>
            <p class="mb-0">Gunakan nama yang jelas dan deskripsi yang mudah dipahami agar tutor dan siswa mengetahui materi yang dipelajari.</p>
        </div>
    </div>
</div>
@endsection
```
