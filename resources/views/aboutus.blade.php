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
            display: none; /* Oculto por defecto */
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
            font-size: 24px; /* Ajusta el tamaño según lo necesites */
            font-weight: bold;
            margin: 0; /* Evita espacios extra */
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
    </style>

<body>

    <div class="about-container">
        <h1 class="about-title">Sobre nosotras</h1>
        <p class="about-text">
            Somos una marca creada por ingenieras químicas apasionadas por la creación de cosmética natural y velas artesanales. 
            Ubicados en Nuevo León, nuestro objetivo es ofrecer productos de alta calidad mientras promovemos condiciones dignas 
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
                    Nuestra misión es clara: combinar ciencia y naturaleza para brindarte productos que no solo cuiden de ti, 
                    sino también del medio ambiente. Nos comprometemos a crear una línea de cosmética natural garantizando que 
                    cada artículo esté libre de químicos nocivos y sea seguro para ti y tu familia.
                </p>
            </div>
            <img src="{{ asset('assets/foto1.png') }}" class="info-img">
        </div>
        <p class="team-name">Rosa Núñez</p>
        <p class="team-role">Propietaria</p>

        <div class="info-section" style="display: flex; align-items: flex-start;">
            <img src="{{ asset('assets/foto2.png') }}" class="info-img" style="width: 300px; height: auto; margin-right: 20px; margin-top: 5px;">
            <div class="info-text">
                <div class="info-title">
                    <img src="{{ asset('assets/estrella.png') }}" alt="Star" class="info-icon">
                    <h2 class="info-title">Calidad y Pasión en Cada Producto</h2>
                </div>
                <div class="linea" style="border-top: 1px solid #D1BEBB; height: 2px; max-width: 100%; margin: 10px 0;"></div>
                <p>
                    Nos enorgullece no solo ofrecerte productos excepcionales, sino también compartir contigo la pasión y 
                    dedicación que ponemos en cada uno de ellos. Desde nuestras velas aromáticas hasta nuestra cosmética natural, 
                    cada creación está diseñada para proporcionarte una experiencia única y enriquecedora.
                </p>
            </div>
        </div>
        <p style="margin-left: 175px; font-weight: bold;">Madali Salas</p>
        <p style="margin-left: 200px; font-size: 14px; color: #7a615a;">Socia</p>

        <div class="info-section" style="display: flex; justify-content: space-between;">
            <div class="info-text" style="width: 48%;">
                <div class="info-title">
                    <img src="{{ asset('assets/Heart.png') }}" alt="coazon" class="info-icon">
                    <h2 class="info-title">Compromiso con la comunidad</h2>
                </div>
                <div class="linea" style="border-top: 1px solid #D1BEBB; height: 2px; max-width: 100%; margin: 10px 0;"></div>
                <p>
                    En Humo Rosa, creemos en el poder de la comunidad y el empoderamiento femenino. Nos esforzamos por crear un 
                    entorno laboral que ofrezca oportunidades justas y dignas para mujeres mexicanas, fomentando su crecimiento 
                    personal y profesional.
                </p>
            </div>
            <div class="info-text" style="width: 48%; text-align: right;">
                <div class="info-title">
                    <img src="{{ asset('assets/Lightning 01.png') }}" alt="rayito" class="info-icon">
                    <h2 class="info-title">Negocio online</h2>
                </div>
                <div class="linea" style="border-top: 1px solid #D1BEBB; height: 2px; max-width: 100%; margin: 10px 0;"></div>
                <p>
                    Como un pequeño negocio online, nos dedicamos a ofrecerte una experiencia de compra conveniente y personalizada. 
                    Actualmente, no contamos con un establecimiento físico, pero estamos siempre disponibles para atenderte y brindarte 
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
<footer class="social-section" style="width: 100%; background-color: #F7E8E5; padding: 20px 0; text-align: center; display: flex; flex-direction: column; align-items: center;">
    <h2 class="social-title">Síguenos en nuestras redes sociales</h2>
    <p class="social-text">
        Recibe las últimas noticias, los últimos productos y consejos sobre cómo utilizar nuestras velas para maximizar su vida útil.
    </p>
    <div class="social-icons" style="display: flex; justify-content: center; gap: 10px;">
        <img src="{{ asset('assets/Logo--facebook.png') }}" alt="Facebook">
        <img src="{{ asset('assets/Logo--instagram.png') }}" alt="Instagram">
    </div>
</footer>

@endsection