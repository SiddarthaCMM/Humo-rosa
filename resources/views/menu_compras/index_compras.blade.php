@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

<style>
         body{
        background-color:#CEE6F3;
        font-family: "Onest", serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
      }

        .container-fluid{
            background-color: #FFF5F5;
            border-radius: 50px;
            margin-top: 20%;
            margin-left: 12.8%;
            width: 80vw;
            height: 70vh;
        }
        .col-6{
            margin-top: 2%;
            margin-left: 2%;
        }

        .title{
        font-weight: bold;
        }
        .line{
            margin: auto;
            width:94%;
            margin-top: 5px;
        }
        h4{
            text-align: center;
        }

        .btn{
            width: auto;
        }

        .btn:hover{
            background-color: #e67571;
            border-color: #DDA09E;
        }

        .cancel{
            border-color: #A57268;
            color: #A57268;
            margin-left: 45%;
        }
    
        .save {
        background-color: #DDA09E;
        color: #FFFF;
        border-color: #DDA09E;
        margin-left: 45%;
        }

        .change{
          background-color: #DDA09E;
          color: #FFFF;
          border-color: #DDA09E;
        }

        .method{
          margin-top: 5%;
        }

        .profile_data{
        margin-top: 5.5%;
        margin-left: 10%;
      }

      .form-check{
        margin-left: 10px;
      }

      .buttons{
        margin-left: 45%;
      }

      @media (min-width: 375px) and (max-width: 767px) { 
    
      .buttons{
       flex-direction: column;
       justify-content: center;
      }

      #btn{
        width: 90px;
      }
      
      }

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
</style>

<body>
    <button class="btn btn-secondary" style="background-color: #e67571; border-color: #e67571;" onclick="window.history.back();">
        ⬅ Regresar
    </button>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 profile_data ">
            <p class="title">Mis compras</p> <br>
            <p>Revisa tu historial de pedidos o verifica el estado de un pedido reciente.</p>
            </div>
            <hr class="line">
            <h4 class="second-title">Todavia no se ha realizado ningún pedido</h4>
            <div class="d-flex justify-content-center">
                <button type="button" id="btn" class="btn btn-primary save">
                Comenzar a navegar
                </button>
            </div>
            </div>
        </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>


@endsection