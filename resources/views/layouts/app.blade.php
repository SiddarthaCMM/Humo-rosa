<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--PWN-->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#4CAF50">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & CSS -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- 👇 Estilos personalizados para páginas específicas (como el login) --}}
    @stack('styles')

    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .container-fluit {
            background-color:rgb(236, 193, 191);
        }
          /* Navegacion  */
        .logo{
            filter: contrast(300%);
        }
        .nav {
            display: flex;
            gap: 20px;
        }
      
        .nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
            position: relative;
            padding-bottom: 5px; /* Espacio para la línea */
        }

        .nav a.active::after {
            content: "";
            display: block;
            width: 50%;
            height: 2px;
            background-color: #5a4035;
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav a::after {
            content: "";
            display: block;
            width: 0%;
            height: 2px;
            background-color: #A57268; 
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease-in-out;
        }

        .nav a:hover::after {
            width: 100%;
        }

        .nav-link:hover{
            color: #5a4035;
        }

        .svg {
            border-radius: 150%;
            width: 40px;
            height: 40px;
            border-color: #A57268;
            background-color: #F6D8D7;
        }

          /*icono */

        .svg:hover {
            background-color: #f06f8f;
            border-color: #f06f8f;
        }

        .dropdown-toggle {
            border-radius: 20px;
            border-color: #A57268;
            color: #A57268;
            background-color: #F6D8D7;
        }

        .dropdown-toggle:hover {
            background-color: #DDA1A1;
            border-color: #DDA1A1;
        }

          /* Botones */
          .button {
            width: 9vw;
            height: 4vh;
            border-radius: 30px;
            font-family: "Onest", serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
            text-decoration: none;
            color: white;
            outline: none; /* Elimina el contorno azul */
            border: none;
        }

        .botones{
            display: flex;
        }

        .sign {
            background-color:rgb(248, 147, 143);
            border: none;
            transition: transform 0.3s ease-in-out;
        }

        .sign:hover{
            transform: scale(1.1);
        }

        .register {
            background-color: #CD7E7E;
            border: none;
            margin-left: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .register:hover{
            transform: scale(1.1);
        }

        .container-fluit {
            background-color:rgb(236, 193, 191);
        }
          /* Navegacion  */
        .logo{
            filter: contrast(300%);
        }
        .nav {
            display: flex;
            gap: 20px;
        }
      
        .nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 16px;
            position: relative;
            padding-bottom: 5px; /* Espacio para la línea */
        }

        .nav a.active::after {
            content: "";
            display: block;
            width: 50%;
            height: 2px;
            background-color: #5a4035;
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav a::after {
            content: "";
            display: block;
            width: 0%;
            height: 2px;
            background-color: #A57268; 
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease-in-out;
        }

        .nav a:hover::after {
            width: 100%;
        }

        .nav-link:hover{
            color: #5a4035;
        }

        .svg {
            border-radius: 150%;
            width: 40px;
            height: 40px;
            border-color: #A57268;
            background-color: #F6D8D7;
        }

          /*icono */

        .svg:hover {
            background-color: #f06f8f;
            border-color: #f06f8f;
        }

        .dropdown-toggle {
            border-radius: 20px;
            border-color: #A57268;
            color: #A57268;
            background-color: #F6D8D7;
        }

        .dropdown-toggle:hover {
            background-color: #DDA1A1;
            border-color: #DDA1A1;
        }

        .search{
          margin-left: 90px;
        }

          /* Responsivo */

        @media (min-width: 375px) and (max-width: 770px){
            .sign, .register{
                width: 100%;
                justify-content: center;
            }

            .menuUp{
                width: 100%;
            }

            .nav-link{
                font-size: 1rem;
            }
        }
    </style>
</head>

<body class="{{ app()->bound('login_page') && app('login_page') === true ? 'login-page' : '' }}">
    @if (app()->bound('login_page') && app('login_page') === true)
        {{-- Solo login/register sin navbar --}}
        <main class="py-4">
            @yield('content')
        </main>
    @else
        {{-- Layout general con navbar --}}
        <div id="app" class="container-fluit menuUp">
            <nav
                class="navbar d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="{{ url('/') }}" class="d-inline-flex link-body-emphasis text-decoration-none ps-5">
                        <img class="logo" src="{{ asset('assets/logo_humo_rosa-removebg-preview.png') }}" alt="logo humo-rosa"
                            height="90px">
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 gap-5">
                    <li><a href="{{ url('/') }}" class="nav-link px-2">Inicio</a></li>
                    <li><a href="{{ url('/catalogue') }}" class="nav-link px-2">Productos</a></li>
                    <li><a href="{{ route('aboutus') }}" class="nav-link px-2">Sobre Nosotros</a></li>
                    <li><a href="{{ route('contacto') }}" class="nav-link px-2">Contacto</a></li>
                </ul>

                @guest
                    @if (Route::has('login'))
                    <div class="botones">
                        <a href="{{ route('login') }}" class="nav__social-link">
                            <button class="button sign">Inicia Sesión</button>
                        </a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('login', ['view' => 'register']) }}" class="nav__social-link">
                            <button class="button register">Regístrate</button>
                        </a>
                    </div>
                    @endif
                @else
                    <div class="col-md-3 text-end">
                        <button type="button" class="btn svg btn-outline-primary me-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#A57268"
                                class="bi bi-search-heart" viewBox="0 0 16 16">
                                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                                <path
                                    d="M13 6.5a6.47 6.47 0 0 1-1.258 3.844q.06.044.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11" />
                            </svg></button>
                        <button type="button" class="btn svg btn-outline-primary me-2" data-bs-toggle="modal"
                            data-bs-target="#miModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#A57268"
                                class="bi bi-bag-heart" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                            </svg>
                        </button>
                    </div>

                    <div class="dropdown pe-5">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#A57268"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            </svg> {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('configuration') }}">Configuración</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar
                                    Sesión</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @endguest
            </nav>
        </div>
        
        @yield('content')
    @endif

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('{{ asset('service-worker.js') }}')
        .then(function(registration) {
            console.log('Service Worker registrado con éxito:', registration);
        })
        .catch(function(error) {
            console.log('Error al registrar el Service Worker:', error);
        });
    }
    </script>
    

    @stack('scripts')
</body>

</html>
