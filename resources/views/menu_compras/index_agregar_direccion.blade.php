@extends('layouts.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

<style>
         body{
        background-color:#FFF5F5;
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
  <button class="col-6 btn btn-secondary" style="background-color: #e67571; border-color: #e67571;" onclick="window.history.back();">
    ⬅ Regresar
</button>
    <div class="col-6 container-fluid">
        <div class="row">
            <div class="col-6 profile_data ">
                <p class="title">Mis direcciones</p> <br>
                <p>Agrega y administra las direcciones que utilizas con frecuencia..</p>
            </div>
            <hr class="line">

            <div class="col-6 profile_data d-flex ">
                    <p>Cexar Alepsis <br> 
                        Guadalupe Infonavit #105 <br>
                            privada ultima casa dos pisos <br>
                                Durango, Dgo, 34226 México <br>
                                    6181234568</p> 
                    
            </div>

            <div class="col-4 d-flex buttons">
                <button type="button" class="btn btn-outline-primary cancel" id="btn">Editar</button>
                <button type="button" id="btn" class="btn btn-primary save">
                Eliminar
                </button>
            </div>
        
                <div class="col-6 profile_data">
                        <p>Dirección predeterminada</p>
                </div>
                <hr class="line">
                
                <div class="col-4">
                    <button type="button" id= "btn" class="btn btn-primary save method" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Agregar nueva dirección</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h2>Agregar nueva dirección</h2>
                            <button type="button" class="btn-close method" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="recipient-name" class="col-form-label">Nombre</label> 
                                  <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="col-md-6">
                                  <label for="apellido" class="col-form-label">Apellido</label>
                                  <input type="text" class="form-control" id="apellido">
                                </div>
                              </div>

                                <div class="md-3">
                                  <label for="recipient-name" class="col-form-label">Teléfono</label> 
                                  <input type="text" class="form-control" id="recipient-name">
                                </div>
                       
                              <div class="mb-3 mt-3">
                                <label for="recipient-name" class="col-form-label">Ciudad</label>
                                <input type="text" class="form-control" id="recipient-name">
                              </div>

                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Fraccionamiento/Colonia</label>
                                <input type="text" class="form-control" id="recipient-name">
                              </div>

                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Calle</label>
                                <input type="text" class="form-control" id="recipient-name">
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="recipient-name" class="col-form-label">Número exterior</label> 
                                  <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="col-md-6">
                                  <label for="apellido" class="col-form-label">Número interior(opcional)</label>
                                  <input type="text" class="form-control" id="apellido">
                                </div>
                              </div>

                              <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Código postal</label>
                                <input type="text" class="form-control" id="recipient-name">
                              </div>

                            </form>
                          </div>

                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Dirección predeterminada
                            </label>
                          </div>

                          <div class="modal-footer d-flex">
                            <button type="button" class="btn btn-secondary change" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary change">Cambiar</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

         </div>
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

@endsection