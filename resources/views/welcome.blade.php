<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    <link rel="stylesheet" href="{{ asset('css/styleHome.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    <title>Humo-rosa</title>
    <style>
        .container-fluit {
            background-color: #dbb5b4;

        }

        .nav-link {
            font-family: "Onest", serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
            color: white;
        }

        .nav-link:hover {
            color: #f06f8f
        }


        .svg {
            border-radius: 150%;
            width: 40px;
            height: 40px;
            border-color: #A57268;
            background-color: #F6D8D7;
        }

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
            background-color: #f06f8f;
            border-color: #f06f8f;
        }
    </style>
</head>
<!--
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
@else
    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                            @if (Route::has('register'))
    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
    @endif
                    @endauth
                </div>
            @endif
    -->

<!--Modal del carrito-->
<div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-lg"> <!-- Aumenta el tamaño del modal -->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #DDA1A1;">
                    <h5 class="modal-title" id="miModalLabel" style="color: black">
                        Carrito ({{ $cartProducts->count() }} item/items)
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    @if ($cartProducts->isEmpty())
                        <p class="text-center">No hay productos en el carrito.</p>
                    @else
                        <div class="container-fluid">
                            <div class="row row-cols-1 row-cols-md-2 g-3">
                                @foreach ($cartProducts as $product)
                                    <div class="col">
                                        <div class="card h-100 shadow-sm">
                                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid rounded" style="max-height: 150px; object-fit: cover;" alt="{{ $product->name }}">
                                            <div class="card-body text-center">
                                                <h6 class="text-primary">{{ $product->name }}</h6>
                                                <p class="text-danger fw-bold">${{ number_format($product->price, 2) }}</p>
                                                <div class="input-group justify-content-center">
                                                <button class="btn btn-outline-secondary btn-sm btn-decrement" type="button" data-product-id="{{ $product->id }}">-</button>
                                                <input type="text" id="quantity-{{ $product->id }}" class="form-control text-center" value="{{ $product->quantity }}" style="max-width: 50px;" readonly>
                                                <button class="btn btn-outline-secondary btn-sm btn-increment" type="button" data-product-id="{{ $product->id }}">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-collection2" data-bs-dismiss="modal">Cerrar</button>
                    <form action="{{ route('payment') }}" method="GET">
                        <button type="submit" class="btn btn-success">Finalizar compra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--- =============== MAIN ==================== -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid main">
    <header class="header">
        <nav class="nav container">
            <a href="{{ url('/') }}" class="nav__logo"><img
                    src="{{ asset('assets/logo_humo_rosa-removebg-preview.png') }}" alt="logo humo rosa"
                    height="100" /></a>

            <div class="nav__menu" id=nav-menu>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ url('/') }}" class="nav__link">
                            <i class="ri-arrow-right-up-line"></i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="{{ url('/catalogue') }}" class="nav__link">
                            <i class="ri-arrow-right-up-line"></i>
                            <span>Productos</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="{{ route('aboutus') }}" class="nav__link">
                            <i class="ri-arrow-right-up-line"></i>
                            <span>Sobre nosotras</span>
                        </a>
                    </li>

                    <li class="nav__item">
                        <a href="{{ route('contacto') }}" class="nav__link">
                            <i class="ri-arrow-right-up-line"></i>
                            <span>Contacto</span>
                        </a>
                    </li>
                </ul>

                <!-- Close button -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-large-line"></i>
                </div>

                <div class="nav__social">
                    @guest
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="nav__social-link">
                                <button class="button sign">Inicia Sesion</button>
                            </a>
                        @endif

                        @if (Route::has('register'))
                            <a href="{{ route('login', ['view' => 'register']) }}" class="nav__social-link">
                                <button type="button" class="button register">Regístrate</button>
                            </a>
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
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Cerrar
                                        Sesión</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>

            <!-- Toggle button -->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line"></i>
            </div>
        </nav>
    </header>
    <div class="main-text" id="smokeList">
        <h2 class="smoke">Encendemos momentos <br>
            Iluminamos emociones</h2>
        <p class="smoke">Descubre la magia de nuestras velas <br>
            hechas a mano</p>
        <a class="smoke" href="{{ url('/catalogue') }}" class="nav__social-link">
            <button class="button info">Conoce nuestro catálogo</button>
        </a>

    </div>
</div>
<div class="container-iconos" id="gradient-background">
    <div class="marca">
        <p class="icono">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                class="bi bi-box" viewBox="0 0 16 16">
                <path
                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
            </svg>
        <p class="icono texto">
            Los mejores Precios <br> Tú cartera no llorará
        </p>
    </div>
    </p>
    <div class="marca">
        <p class="icono">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                class="bi bi-truck" viewBox="0 0 16 16">
                <path
                    d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5zm1.294 7.456A2 2 0 0 1 4.732 11h5.536a2 2 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456M12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
            </svg>
        <p class="icono texto">
            Envíos rapidos <br> Ordena ya
        </p>
        </p>
    </div>
    <div class="marca">
        <p class="icono">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                class="bi bi-clock-history" viewBox="0 0 16 16">
                <path
                    d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                <path
                    d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
            </svg>
        <p class="icono texto">
            Soporte 24/7 <br> Nos importa tu opinión
        </p>
        </p>
    </div>
    <div class="marca">
        <p class="icono">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                class="bi bi-shield-check" viewBox="0 0 16 16">
                <path
                    d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                <path
                    d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
            </svg>
        <p class="icono texto">
            Pago Seguro <br> Metodos de pago 100% Seguros
        </p>
        </p>
    </div>
</div>

<div class="container-fluid">
    <div class="row position-relative">
        <div class="col">
            <hr class="full-width-hr" style="color: #9c2811;">
        </div>

        <div id="texto" class="col-auto text-center position-relative">
            <p style="color: #A57268;">Productos Destacados</p>
        </div>

        <div class="col">
            <hr class="full-width-hr" style="color: #A57268;">
        </div>
    </div>
</div>
<!-- Carousel -->
<div class="container mt-5 col-auto">
    <div id="carouselProductos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($productos->chunk(3) as $grupo)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <div class="row justify-content-center">
                        @foreach ($grupo as $producto)
                            <div class="col-md-4 @if ($loop->iteration !== 2) d-none d-md-block @endif">
                                <div class="card">
                                    <img src="{{ asset('storage/' . $producto->image) }}" class="img-fluid"
                                        alt="{{ $producto->name }}"
                                        style="height: 300px; width: 350px; object-fit: cover">
                                    <div class="row justify-content-between">
                                        <p style="color: #A57268;">{{ $producto->name }}</p>
                                        <div class="col-4">
                                            <p style="color: #FF0000;">${{ number_format($producto->price, 2) }}</p>

                                            <div class="button-buy">
                                                @if (auth()->check())
                                                    <form id="addToCartForm" method="POST"
                                                        action="{{ route('cart.add', ['productId' => $producto->id, 'quantity' => 1]) }}">
                                                        @csrf

                                                        <button type="submit" class="btn-collection"
                                                            id="addToCartButton" data-id="{{ $producto->id }}">
                                                            Agregar al carrito
                                                        </button>
                                                    </form>
                                                @else
                                                    <!-- Si no hay sesión, redirigir al login -->
                                                    <a href="{{ route('login') }}" class="btn-collection">
                                                        <i class="fas fa-star"></i> Comprar
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>
<!-- Custom Card -->
<div class="container my-5 col-auto">
    <div class="row align-items-center custom-card">
        <div class="col-md-8">
            <h2 class="fw-bold text-secondary">{{ $categoria->category }}</h2>
            <button class="btn btn-collection my-3">Ver Colección</button>
            <p class="text-secondary">
                @php
                    $mensajes = [
                        'Anime' =>
                            'Sumérgete en el mundo de tus series y personajes favoritos con nuestra colección inspirada en el anime. ¡Lleva la esencia de la cultura japonesa a tu rutina diaria!',
                        'Celebridades' =>
                            'Siente el glamour y la sofisticación de tus íconos favoritos con nuestra colección de velas inspiradas en celebridades. ¡Un toque de lujo para tu recamara!',
                        'Aromáticas' =>
                            'Despierta tus sentidos con nuestra colección de velas aromáticas. Fragancias envolventes y relajantes para ese ambiente perfecto.',
                        'Cosmética Natural' =>
                            '¡Descubre el ritual de belleza que tu piel merece! Nuevos y adorables diseños de jabones que aportan una nutrición exquisita a tu rutina.',
                    ];
                @endphp

                {{ $mensajes[$categoria->category] ?? 'Descubre nuestra colección exclusiva diseñada para el bienestar y la belleza de tu piel.' }}
            </p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $productoCategoria->image) }}"
                alt="Producto de {{ $categoria->category }}" class="img-fluid rounded"
                style="height: 300px; width: 300px; object-fit: cover">
        </div>
    </div>
</div>

<br>
<!-- Comments clients -->
<div class="container-fluid">
    <div class="row position-relative">
        <div class="col">
            <hr class="full-width-hr" style="color: #A57268;">
        </div>

        <div id="texto" class="col-auto text-center position-relative">
            <p style="color: #A57268;">Lo que dicen nuestros clientes</p>
        </div>

        <div class="col">
            <hr class="full-width-hr" style="color: #A57268;">
        </div>
    </div>
</div>

<div class="container my-5 col-auto">
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-info-circle"></i> Marta García
                    </h5>
                    <p class="card-text">Me gustaron</p>
                    <button class="btn-collection">
                        <i class="fas fa-star"></i> Me sirvió
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-info-circle"></i> Juan Pérez
                    </h5>
                    <p class="card-text">10/10 repetiría</p>
                    <button class="btn-collection">Me sirvió</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="custom-card text-center">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-info-circle"></i> Alan Moreno
                    </h5>
                    <p class="card-text">Me gustaron mucho las velas</p>
                    <button class="btn-collection">Me sirvió</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<div class="container-fluid" id="gradient-background">
    <footer class="py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Menu</h5>
                <ul class="flex-column">
                    <li class="nav-item mb-2"><a href="{{ url('/catalogue') }}"
                            class="nav-link p-0 text-body-secondary">Todos los productos</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Categorias</h5>
                <ul class="flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ url('/catalogue?categoria=Anime') }}"
                            class="nav-link p-0 text-body-secondary">Anime</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/catalogue?categoria=Cosmética%20Natural') }}"
                            class="nav-link p-0 text-body-secondary">Cosmética Natural</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/catalogue?categoria=Celebridades') }}"
                            class="nav-link p-0 text-body-secondary">Celebridades</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/catalogue?categoria=Aromáticas') }}"
                            class="nav-link p-0 text-body-secondary">Aromáticas</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/catalogue?categoria=Todo') }}"
                            class="nav-link p-0 text-body-secondary">Todo</a>
                    </li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Nuestra compañia</h5>
                <ul class="flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('aboutus') }}" class="nav-link p-0 text-body-secondary">Sobre
                            nosotras</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('contacto') }}"
                            class="nav-link p-0 text-body-secondary">Contactanos</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Recibe las últimas noticias, los últimos productos y consejos sobre como utilizar nuestras velas
                        para maximizar su vida útil.</h5>
                    <p>Únete a la comunidad.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Tu dirección email</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Suscribete</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2025 Humo-rosa, Inc. Todos los Derechos reservados.</p>
            <ul class="list-unstyled d-flex">
                <a href="https://www.facebook.com/profile.php?id=61554481344201" target="_blank"
                    class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-facebook" viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                </a>

                <a href="https://www.instagram.com/humo.rosa.mx/?igsh=MWwwZDl6N2Q5NG5iYw%3D%3D" target="_blank"
                    class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                </a>
            </ul>
        </div>
    </footer>
</div>
<!-- Boostrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--=============== MAIN JS ===============-->
<script src="{{ asset('js/main.js') }}"></script>
</body>

<script>
    $(document).on('click', '#addToCartButton', function(event) {
        event.preventDefault(); // Prevenir la acción por defecto

        var productId = $(this).data('id'); // Obtener el ID del producto desde el botón
        console.log("Product ID: ", productId); // Verifica que el ID es correcto
        var quantity = 1; // La cantidad del producto, en este caso es 1

        $.ajax({
            url: '/cart/add/' + productId + '/' + quantity,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // Incluir el token CSRF
            },
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Producto agregado!',
                    text: response.message
                });
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al agregar el producto al carrito.',
                });
            }
        });
    });

    $(document).ready(function() {
        // Delegación de eventos para los botones de incremento y decremento
        $('#miModal').on('click', '.btn-increment', function() {
            var productId = $(this).data('product-id');
            var quantityInput = $('#quantity-' + productId);
            var currentQuantity = parseInt(quantityInput.val());
            
            quantityInput.val(currentQuantity + 1);
            updateCartQuantity(productId, currentQuantity + 1);
        });

        $('#miModal').on('click', '.btn-decrement', function() {
            var productId = $(this).data('product-id');
            var quantityInput = $('#quantity-' + productId);
            var currentQuantity = parseInt(quantityInput.val());

            if (currentQuantity > 1) {
                quantityInput.val(currentQuantity - 1);
                updateCartQuantity(productId, currentQuantity - 1);
            }
        });
    });

    // Función para actualizar la cantidad en el carrito
    function updateCartQuantity(productId, quantity) {
        $.ajax({
            url: '/update-cart/' + productId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                quantity: quantity
            },
            success: function(response) {
                if (response.success) {
                    console.log('Cantidad actualizada con éxito');
                }
            },
            error: function() {
                console.log('Error al actualizar la cantidad');
            }
        });
    }
</script>

</html>
