<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-light" href="{{ route('home') }}">TIKI</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light fw-semibold {{ request()->routeIs('home') ? 'border-bottom border-2' : 'border-0' }}"
                        aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-semibold {{ request()->routeIs('trips') ? 'border-bottom border-2' : 'border-0' }}"
                        aria-current="page" href="{{ route('trips') }}">Trips</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
