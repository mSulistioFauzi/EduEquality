
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold">
            <i class="bi bi-stack me-2"></i>EduEqual
        </a>

        <div class="ms-auto d-flex align-items-center gap-2">
            @auth
                <span class="text-white d-none d-sm-inline">
                    <i class="bi bi-person-circle me-1"></i>
                    {{ auth()->user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-light btn-sm" type="submit">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">
                    Login
                </a>

                <a href="{{ route('register') }}" class="btn btn-light btn-sm">
                    Daftar
                </a>
            @endauth
        </div>
    </div>
</nav>
