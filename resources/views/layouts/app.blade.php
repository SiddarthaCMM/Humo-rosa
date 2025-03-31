<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!--
    <style>
    .container-fluit{
        background-color: #dbb5b4;
        
    }

    .nav-link{
        font-family: "Onest", serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        color: white;
    }

    .nav-link:hover{
        color: #f06f8f
    }

   
    .svg{
        border-radius: 150%;
        width: 40px;
        height: 40px;
        border-color: #A57268;
        background-color: #F6D8D7;
    }

    .svg:hover{
        background-color: #f06f8f;
        border-color: #f06f8f;
    }

    .dropdown-toggle{
        border-radius: 20px;
        border-color: #A57268;
        color: #A57268;
        background-color: #F6D8D7;
    }

    .dropdown-toggle:hover{
        background-color: #f06f8f;
        border-color: #f06f8f;
    }
 
    
    </style>
    -->
</head>
<!--
<body>

  <div id="app" class="container-fluit">
          <nav class="navbar d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
              <a href="{{ url('/') }}" class="d-inline-flex link-body-emphasis text-decoration-none ps-5">
                <img src="{{asset ('assets/logo_humo_rosa-removebg-preview.png')}}" alt="logo humo-rosa" height="80px">
              </a>
            </div>
      
            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 gap-5">
              <li><a href="#" class="nav-link px-2">Inicio</a></li>
              <li><a href="#" class="nav-link px-2">Productos</a></li>
              <li><a href="#" class="nav-link px-2">Sobre Nosotros</a></li>
              <li><a href="#" class="nav-link px-2">Contacto</a></li>
            </ul>
      
              <div class="col-md-3 text-end">
                <button type="button" class="btn svg btn-outline-primary me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#A57268" class="bi bi-search-heart" viewBox="0 0 16 16">
                    <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018"/>
                    <path d="M13 6.5a6.47 6.47 0 0 1-1.258 3.844q.06.044.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11"/>
                </svg></button>
                <button type="button" class="btn svg btn-outline-primary me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill= "#A57268" class="bi bi-bag-heart" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                </svg></button>
              </div>

            <div class="dropdown pe-5">
              <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#A57268" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                  </svg> Usuario
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Favoritos</a></li>
                <li><a class="dropdown-item" href="#">Guardados</li>
                <li><a class="dropdown-item" href="#">Configuración</a></li>
              </ul>
            </div>

          </nav>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
-->
  <body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!  -- Left Side Of Navbar 
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->  
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
