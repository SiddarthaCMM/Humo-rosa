<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & CSS -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>

@php
    // Evita error si 'login_page' no ha sido inyectado
    $isAuthPage = app()->bound('login_page') && app('login_page');
@endphp

<body class="{{ $isAuthPage ? 'login-page' : '' }}">

    <div id="app" class="container-fluit">

        @if (!$isAuthPage)
            <!-- NAVBAR -->
            <nav
                class="navbar d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="{{ url('/') }}" class="d-inline-flex link-body-emphasis text-decoration-none ps-5">
                        <img src="{{ asset('assets/logo_humo_rosa-removebg-preview.png') }}" alt="logo humo-rosa"
                            height="80px">
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 gap-5">
                    <li><a href="#" class="nav-link px-2">Inicio</a></li>
                    <li><a href="#" class="nav-link px-2">Productos</a></li>
                    <li><a href="#" class="nav-link px-2">Sobre Nosotros</a></li>
                    <li><a href="#" class="nav-link px-2">Contacto</a></li>
                </ul>

                <div class="col-md-3 text-end">
                    <!-- Botones -->
                    <button class="btn svg btn-outline-primary me-2">🔍</button>
                    <button class="btn svg btn-outline-primary me-2">🛍️</button>

                    <!-- Dropdown -->
                    <div class="dropdown d-inline">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            👤 Usuario
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Favoritos</a></li>
                            <li><a class="dropdown-item" href="#">Guardados</a></li>
                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        <!-- CONTENIDO -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
