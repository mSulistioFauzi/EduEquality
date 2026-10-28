<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'EduEqual')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="@hasSection('auth-page') auth-body @else bg-light @endif">

    @unless (View::hasSection('auth-page'))
        @include('components.navbar')
    @endunless

    @hasSection('auth-page')
        @yield('content')
    @else
        <main class="container py-5">
            @yield('content')
        </main>

        <footer class="text-center text-secondary py-4">
            <small>
                &copy; {{ date('Y') }} EduEqual — Pendidikan untuk Semua
            </small>
        </footer>
    @endif

    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const popupTheme =
                document.documentElement.getAttribute('data-bs-theme') === 'dark'
                    ? 'dark'
                    : 'light';

            const popup = Swal.mixin({
                theme: popupTheme,
                confirmButtonColor: '#087f8c',
                cancelButtonColor: '#6c757d',
                buttonsStyling: true,
                customClass: {
                    popup: 'eduequal-popup',
                    confirmButton: 'eduequal-popup-confirm',
                    cancelButton: 'eduequal-popup-cancel'
                }
            });

            // Notifikasi berhasil
            @if (session('success'))
                popup.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    confirmButtonText: 'Oke',
                    timer: 2500,
                    timerProgressBar: true,
                    showConfirmButton: true
                });
            @endif

            // Notifikasi gagal
            @if (session('error'))
                popup.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: @json(session('error')),
                    confirmButtonText: 'Mengerti'
                });
            @endif

            // Notifikasi validasi form
            @if ($errors->any())
                popup.fire({
                    icon: 'warning',
                    title: 'Periksa Kembali Data',
                    text: @json($errors->first()),
                    confirmButtonText: 'Perbaiki'
                });
            @endif

            // Konfirmasi penghapusan atau tindakan penting
            document.querySelectorAll('form[data-confirm]').forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.dataset.confirmed === 'true') {
                        return;
                    }

                    event.preventDefault();

                    popup.fire({
                        icon: 'warning',
                        title: form.dataset.confirmTitle || 'Apakah Kamu Yakin?',
                        text: form.dataset.confirm,
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Lanjutkan',
                        cancelButtonText: 'Batal',
                        reverseButtons: true,
                        focusCancel: true
                    }).then(function (result) {
                        if (result.isConfirmed) {
                            form.dataset.confirmed = 'true';
                            form.requestSubmit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
