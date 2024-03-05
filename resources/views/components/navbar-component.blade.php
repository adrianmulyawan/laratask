<nav class="navbar navbar-expand-lg border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('frontend/images/laravel-logo.png') }}" alt="navbar-logo" class="img-fluid" width="40px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="/blog">
                        Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="btn btn-primary">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
