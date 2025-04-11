@extends('layouts.app')

@section('content')

    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Reset */
        body {
            margin: 0;
            font-family: 'Onest', sans-serif;
            background-color: #FAEEEE;
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #e3c0bb;
            padding: 15px 40px;
        }

        .logo img {
            height: 50px;
        }

        /* Navegación */
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
            padding-bottom: 5px;
            /* Espacio para la línea */
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

        /* Iconos */
        .icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-btn {
            background-color: #f7e2df;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
        }

        .icon-btn img {
            width: 20px;
            height: 20px;
        }

        /* Contenedor del perfil */
        .profile-container {
            position: relative;
        }

        /* Botón de perfil */
        .profile {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: #f7e2df;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .profile img {
            width: 20px;
            height: 20px;
        }

        .profile .dropdown::after {
            content: "▼";
            font-size: 12px;
            color: #5a4035;
        }

        /* Menú desplegable */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #f7e2df;
            border-radius: 8px;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
            list-style: none;
            width: 150px;
            display: none;
            /* Oculto por defecto */
            margin-top: 5px;
        }

        /* Estilos de los elementos del menú */
        .dropdown-menu li {
            padding: 10px;
        }

        .dropdown-menu li a {
            text-decoration: none;
            color: #5a4035;
            display: block;
        }

        /* Hover en los elementos */
        .dropdown-menu li:hover {
            background-color: #e3c0bb;
        }

        /* Mostrar el menú cuando el cursor está sobre el perfil */
        .profile-container:hover .dropdown-menu {
            display: block;
        }

        .about-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .about-title {
            text-align: center;
            font-family: 'Onest', sans-serif;
            color: #A57268;
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .about-text {
            font-size: 18px;
            line-height: 1.6;
            color: #000;
        }

        /* Bloques de información */

        .info-section {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
        }

        .info-text {
            width: 50%;
            padding: 20px;
            text-align: left;
            margin-left: 0;
        }



        .info-text {
            width: 50%;
            padding: 20px;
            text-align: left;
        }

        .info-title {
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-title {
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-title h2 {
            font-family: 'Onest', sans-serif;
            font-size: 24px;
            /* Ajusta el tamaño según lo necesites */
            font-weight: bold;
            margin: 0;
            /* Evita espacios extra */
        }

        .info-title::before {

            font-size: 22px;
        }

        .info-text p {
            text-align: left;
            font-size: 16px;
            line-height: 1.6;
        }

        .info-img {
            width: 300px;
            height: auto;
            margin-top: 50px;
            margin-right: 100px;
            margin-left: 70px;
        }


        .info-img img {
            width: 25%;
            height: auto;
            margin-left: 100px;

        }



        .team-role {
            font-size: 14px;
            color: #7a615a;
            text-align: right;
        }

        .team-name {
            margin-right: 170px;
            text-align: right;
            font-weight: bold;
            margin-top: 10px;

        }


        .team-role {
            margin-right: 180px;
            font-size: 14px;
            color: #7a615a;
        }

        /* Sección de agradecimiento */
        .thank-you {
            align-content: center;
            background: linear-gradient(to right, #f7e2df, #e3c0bb);
            padding: 30px;
            border-radius: 12px;
            margin: 50px auto;
            max-width: 800px;
        }

        .thank-you p {
            font-size: 18px;
            color: #5a4035;
            margin-bottom: 20px;
        }

        .thank-you button {
            background-color: #5a4035;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Sección de redes sociales */
        .social-section {
            background-color: #faecea;
            padding: 30px 20px;
            margin-top: 50px;
            align-items: center;
        }

        .social-title {
            font-size: 22px;
            font-weight: bold;
        }

        .social-text {
            font-size: 16px;
            color: #7a615a;
            margin-top: 10px;
        }

        .social-icons {
            margin-top: 15px;
            align-items: center;
        }

        .social-icons img {
            width: 30px;
            margin: 0 10px;
        }

        .linea {
            border-top: 1px solid #D1BEBB;
            height: 2px;
            max-width: 2000px;
            padding: 0;
            margin: 20px auto 0 auto;
        }

        .extra {
            margin-left: 175px;
            font-weight: bold;
        }

        .extra2 {
            margin-left: 200px;
            font-size: 14px;
            color: #7a615a;
        }

        #gradient-background {
            background: linear-gradient(300deg, #FFCDB2, #E5989B, #FFB4A2);
            background-size: 180% 180%;
            animation: gradient-animation 5s ease infinite;
        }

        keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        ul {
            list-style: none;
        }

        .foot,
        h5 {
            color: white;
        }

        .foot:hover {
            color: rgb(235, 59, 103)
        }



        @media (min-width: 375px) and (max-width: 770px) {
            .info-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .info-img {
                margin: 15px auto;
            }

            .info-text {
                width: 100%;
                max-width: 100%;
                margin: 10px 0;
            }

            .team-name,
            .team-role {
                text-align: center;
                margin: 5px 0;
            }

            .extra,
            .extra2 {
                text-align: center;
                margin: 5px 0;
            }

            .about-text {
                text-align: center;
            }

            .info-title {
                justify-content: center;
            }
        }
    </style>

    <body>

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

        <div class="about-container">
            <h1 class="about-title">Sobre nosotras</h1>
            <p class="about-text">
                Somos una marca creada por ingenieras químicas apasionadas por la creación de cosmética natural y velas
                artesanales.
                Ubicados en Nuevo León, nuestro objetivo es ofrecer productos de alta calidad mientras promovemos
                condiciones dignas
                para mujeres mexicanas y contribuimos a la economía de manera sustentable.
            </p>
            <div class="linea"></div>
            <div class="info-section">
                <div class="info-text">
                    <div class="info-title">
                        <img src="{{ asset('assets/Smiley Happy.png') }}" alt="Smiley Happy" class="info-icon">
                        <h2>Nuestra misión</h2>
                    </div>
                    <div class="linea"></div>
                    <p>
                        Nuestra misión es clara: combinar ciencia y naturaleza para brindarte productos que no solo cuiden
                        de ti,
                        sino también del medio ambiente. Nos comprometemos a crear una línea de cosmética natural
                        garantizando que
                        cada artículo esté libre de químicos nocivos y sea seguro para ti y tu familia.
                    </p>
                </div>
                <img src="{{ asset('assets/foto1.png') }}" class="info-img">
            </div>
            <p class="team-name">Rosa Núñez</p>
            <p class="team-role">Propietaria</p>

            <div class="info-section" style="display: flex; align-items: flex-start;">
                <img src="{{ asset('assets/foto2.png') }}" class="info-img"
                    style="width: 300px; height: auto; margin-right: 20px; margin-top: 5px;">
                <div class="info-text">
                    <div class="info-title">
                        <img src="{{ asset('assets/estrella.png') }}" alt="Star" class="info-icon">
                        <h2 class="info-title">Calidad y Pasión en Cada Producto</h2>
                    </div>
                    <div class="linea" style="border-top: 1px solid #D1BEBB; height: 2px; max-width: 100%; margin: 10px 0;">
                    </div>
                    <p>
                        Nos enorgullece no solo ofrecerte productos excepcionales, sino también compartir contigo la pasión
                        y
                        dedicación que ponemos en cada uno de ellos. Desde nuestras velas aromáticas hasta nuestra cosmética
                        natural,
                        cada creación está diseñada para proporcionarte una experiencia única y enriquecedora.
                    </p>
                </div>
            </div>
            <p class="extra">Madali Salas</p>
            <p class="extra2">Socia</p>

            <div class="info-section" style="display: flex; justify-content: space-between;">
                <div class="info-text">
                    <div class="info-title">
                        <img src="{{ asset('assets/Heart.png') }}" alt="coazon" class="info-icon">
                        <h2 class="info-title">Compromiso con la comunidad</h2>
                    </div>
                    <div class="linea" style="border-top: 1px solid #D1BEBB; height: 2px; max-width: 100%; margin: 10px 0;">
                    </div>
                    <p>
                        En Humo Rosa, creemos en el poder de la comunidad y el empoderamiento femenino. Nos esforzamos por
                        crear un
                        entorno laboral que ofrezca oportunidades justas y dignas para mujeres mexicanas, fomentando su
                        crecimiento
                        personal y profesional.
                    </p>
                </div>
                <div class="info-text" style="text-align: right;">
                    <div class="info-title">
                        <img src="{{ asset('assets/Lightning 01.png') }}" alt="rayito" class="info-icon">
                        <h2 class="info-title">Negocio online</h2>
                    </div>
                    <div class="linea" style="border-top: 1px solid #D1BEBB; height: 2px; max-width: 100%; margin: 10px 0;">
                    </div>
                    <p>
                        Como un pequeño negocio online, nos dedicamos a ofrecerte una experiencia de compra conveniente y
                        personalizada.
                        Actualmente, no contamos con un establecimiento físico, pero estamos siempre disponibles para
                        atenderte y brindarte
                        el mejor servicio posible.
                    </p>
                </div>
            </div>
            <div class="thank-you" style="text-align: center; display: flex; flex-direction: column; align-items: center;">
                <p>
                    Gracias por ser parte de nuestra historia. Te invitamos a explorar nuestros productos y descubrir
                    la diferencia que la pasión y la calidad pueden hacer.
                </p>
                <a href="{{ route('contacto') }}"><button>Contáctanos</button></a>
            </div>

        </div>
    </body>
    <div class="container-fluid" id="gradient-background">
        <footer class="py-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <ul class="flex-column">
                        <li>
                            <h5>Menu</h5>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ url('/catalogue') }}" class="nav-link p-0 foot">Todos los
                                productos</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <ul class="flex-column">
                        <li>
                            <h5>Categorias</h5>
                        </li>
                        <li class="nav-item mr-3">
                            <a href="{{ url('/catalogue?categoria=Anime') }}" class="nav-link p-0 foot">Anime</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ url('/catalogue?categoria=Cosmética%20Natural') }}"
                                class="nav-link p-0 foot">Cosmética Natural</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ url('/catalogue?categoria=Celebridades') }}"
                                class="nav-link p-0 foot">Celebridades</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ url('/catalogue?categoria=Aromáticas') }}" class="nav-link p-0 foot">Aromáticas</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ url('/catalogue?categoria=Todo') }}" class="nav-link p-0 foot">Todo</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <ul class="flex-column">
                        <li>
                            <h5>Nuestra compañia</h5>
                        </li>
                        <li class="nav-item mb-2"><a href="{{ route('aboutus') }}" class="nav-link p-0 foot">Sobre
                                nosotras</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('contacto') }}"
                                class="nav-link p-0 foot">Contactanos</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5 style="color:white;">Recibe las últimas noticias, los últimos productos y consejos sobre como
                            utilizar nuestras velas
                            para maximizar su vida útil.</h5>
                        <p style="color:white;">Únete a la comunidad.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Tu dirección email</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Suscribete</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p style="color:white">© 2025 Humo-rosa, Inc. Todos los Derechos reservados.</p>
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

    <script>
        $(document).ready(function () {
            // Delegación de eventos para los botones de incremento y decremento
            $('#miModal').on('click', '.btn-increment', function () {
                var productId = $(this).data('product-id');
                var quantityInput = $('#quantity-' + productId);
                var currentQuantity = parseInt(quantityInput.val());

                quantityInput.val(currentQuantity + 1);
                updateCartQuantity(productId, currentQuantity + 1);
            });

            $('#miModal').on('click', '.btn-decrement', function () {
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
                success: function (response) {
                    if (response.success) {
                        console.log('Cantidad actualizada con éxito');
                    }
                },
                error: function () {
                    console.log('Error al actualizar la cantidad');
                }
            });
        }
    </script>

@endsection