@extends('layouts.app')

@section('title', 'Mata Pelajaran - EduEqual')

@section('content')
<div class="subjects-page">
    <div class="subjects-hero mb-4">
        <div class="subjects-hero-content">
            <div class="subjects-hero-icon">
                <i class="bi bi-book-half"></i>
            </div>
            <div>
                <span class="subjects-eyebrow">ADMINISTRATOR</span>
                <h2>Kelola Mata Pelajaran</h2>
                <p>Atur daftar mata pelajaran yang tersedia di platform EduEqual.</p>
            </div>
        </div>

        <a href="{{ route('admin.subjects.create') }}" class="subjects-primary-btn">
            <i class="bi bi-plus-lg"></i>
            Tambah Mata Pelajaran
        </a>
    </div>

    <div class="subjects-summary">
        <div class="subjects-summary-icon">
            <i class="bi bi-journals"></i>
        </div>
        <div>
            <span class="subjects-summary-label">Total Mata Pelajaran</span>
            <h3>{{ $subjects->total() }}</h3>
        </div>
    </div>

    <div class="subjects-panel">
        <div class="subjects-panel-header">
            <div>
                <h5>Daftar Mata Pelajaran</h5>
                <p>Kelola nama dan deskripsi mata pelajaran.</p>
            </div>
            <span class="subjects-count-badge">
                {{ $subjects->total() }} mata pelajaran
            </span>
        </div>

        <div class="table-responsive">
            <table class="table subjects-table align-middle mb-0">
                <thead>
                    <tr>
                        <th class="subjects-number-column">No.</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Deskripsi</th>
                        <th class="subjects-action-column">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subjects as $subject)
                        <tr>
                            <td class="text-secondary">
                                {{ $subjects->firstItem() + $loop->index }}
                            </td>
                            <td>
                                <div class="subjects-name-cell">
                                    <div class="subjects-name-icon">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <span>{{ $subject->nama }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="subjects-description">
                                    {{ $subject->deskripsi ?: 'Belum ada deskripsi' }}
                                </span>
                            </td>
                            <td>
                                <div class="subjects-row-actions">
                                    <a href="{{ route('admin.subjects.edit', $subject) }}" class="subjects-action-btn subjects-edit-btn" title="Edit mata pelajaran" aria-label="Edit {{ $subject->nama }}">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>Edit</span>
                                    </a>

                                    <form action="{{ route('admin.subjects.destroy', $subject) }}" method="POST" data-confirm="Mata pelajaran ini akan dihapus. Tindakan ini perlu dipastikan sebelum dilanjutkan." data-confirm-title="Hapus Mata Pelajaran?">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="subjects-action-btn subjects-delete-btn" title="Hapus mata pelajaran" aria-label="Hapus {{ $subject->nama }}">
                                            <i class="bi bi-trash3"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="subjects-empty-state">
                                    <div class="subjects-empty-icon">
                                        <i class="bi bi-journal-x"></i>
                                    </div>
                                    <h5>Belum Ada Mata Pelajaran</h5>
                                    <p>Tambahkan mata pelajaran agar dapat digunakan di EduEqual.</p>
                                    <a href="{{ route('admin.subjects.create') }}" class="subjects-primary-btn">
                                        <i class="bi bi-plus-lg"></i>
                                        Tambah Mata Pelajaran
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($subjects->hasPages())
            <div class="subjects-pagination">
                <span class="subjects-pagination-info">
                    Menampilkan {{ $subjects->firstItem() }}–{{ $subjects->lastItem() }}
                    dari {{ $subjects->total() }} data
                </span>
                {{ $subjects->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
