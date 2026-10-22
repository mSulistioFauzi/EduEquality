
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'EduEqual')</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                EduEqual
            </a>

            <div class="ms-auto d-flex gap-2">
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-light btn-sm" type="submit">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                       class="btn btn-outline-light btn-sm">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="btn btn-light btn-sm">
                        Daftar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-secondary py-4">
        <small>
            &copy; {{ date('Y') }} EduEqual — Pendidikan untuk Semua
        </small>
    </footer>

</body>
</html>
