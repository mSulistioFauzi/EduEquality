@extends('layouts.app')

@section('title', 'Edit Mata Pelajaran - EduEqual')

@section('content')
<div class="subjects-page">
    <div class="subjects-page-heading">
        <a href="{{ route('admin.subjects.index') }}" class="subjects-back-link">
            <i class="bi bi-arrow-left"></i>
            Kembali ke Mata Pelajaran
        </a>

        <div class="subjects-heading-icon">
            <i class="bi bi-journal-text"></i>
        </div>
        <h2>Edit Mata Pelajaran</h2>
        <p>Perbarui informasi mata pelajaran agar tetap akurat dan mudah dipahami.</p>
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
                <h5>Perbarui Informasi</h5>
                <p>Ubah bagian yang diperlukan, lalu simpan perubahan.</p>
            </div>
        </div>

        <div class="subjects-current-info">
            <i class="bi bi-info-circle"></i>
            <span>Sedang mengedit mata pelajaran: <strong>{{ $subject->nama }}</strong></span>
        </div>

        <form action="{{ route('admin.subjects.update', $subject) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="subjects-form-body">
                <div class="subjects-field">
                    <label for="nama" class="subjects-form-label">
                        Nama Mata Pelajaran <span>*</span>
                    </label>
                    <input type="text" name="nama" id="nama" class="form-control subjects-input @error('nama') is-invalid @enderror" value="{{ old('nama', $subject->nama) }}" placeholder="Contoh: Matematika" maxlength="100" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="subjects-field-help">Gunakan nama mata pelajaran yang jelas, maksimal 100 karakter.</small>
                </div>

                <div class="subjects-field">
                    <label for="deskripsi" class="subjects-form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" maxlength="1000" class="form-control subjects-input subjects-textarea @error('deskripsi') is-invalid @enderror" placeholder="Jelaskan materi atau kemampuan yang dipelajari dalam mata pelajaran ini.">{{ old('deskripsi', $subject->deskripsi) }}</textarea>
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
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <div class="subjects-form-tip">
        <i class="bi bi-lightbulb"></i>
        <div>
            <strong>Perlu diperhatikan</strong>
            <p class="mb-0">Pastikan perubahan nama dan deskripsi sesuai dengan materi yang benar-benar dipelajari.</p>
        </div>
    </div>
</div>
@endsection
```
