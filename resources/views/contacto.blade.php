@extends('layouts.app')

@section('content')

    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
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
        body {
            font-family: 'Onest', sans-serif;
            background-color: #fdeeee;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fde6e6;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #a96b5d;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            text-align: left;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
        }
        .form-row .form-group {
            flex: 1;
            margin-right: 10px;
        }
        .form-row .form-group:last-child {
            margin-right: 0;
        }
        label {
            font-weight:lighter;
            margin-bottom: 5px;
            color: #000;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .button {
            background-color: #d97b6c;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .button:hover {
            background-color: #c5695c;
        }
        .contact-info {
            text-align: left;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .contact-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .contact-info img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
            vertical-align: middle;
        }
        .social-icons {
            margin-top: 10px;
        }
        .social-icons img {
            width: 25px;
            height: 25px;
           
        }
        .button-container {
            text-align: right;
        }
    </style>

<body>
    <div class="container">
        <h2>Contacto</h2>
        <div class="linea"></div>
        <form>
            <div class="form-row">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group" style="margin-left: 20px;">
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
        </form>
        <div class="contact-footer">
            <div class="contact-info">
                <p><img src="{{ asset('assets/Social Icons.png') }}" alt="wasap">618 299 7869</p> <!--Es el número de Alexis, cambiarlo antes del deploy -->
                <p><img src="{{ asset('assets/Mail 01.png') }}" alt="correo"><a href="mailto:hola@humo-rosa.com">hola@humo-rosa.com</a></p>
                <div class="social-icons">
                    <a><img src="{{ asset('assets/coazon.png') }}" alt="Corazón"></a>
                    <a href="https://www.instagram.com/humo.rosa.mx/?igsh=MWwwZDl6N2Q5NG5iYw%3D%3D"><img src="{{ asset('assets/ig.png') }}" alt="Instagram"></a>
                    <a href="https://www.facebook.com/profile.php?id=61554481344201"><img src="{{ asset('assets/fb.png') }}" alt="Facebook"></a>
                </div>
            </div>
            <div class="button-container">
                <button type="submit" class="button">Enviar</button>
            </div>
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