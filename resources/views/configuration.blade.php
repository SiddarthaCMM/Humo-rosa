@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    

    <style>
     body{
        background-color: #FAEEEE;
        font-family: "Onest", serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
      }
      /* Menu izquierdo div */
      .col-1{
        height: 100vh;
        position:fixed;
        z-index: 1000;
        flex-shrink: 0;
      }

      /* logo */
      img {
      object-fit: contain;
      width: 100px;
      margin: auto;
   
      }
      a, .nav-link{
        text-decoration: none;
        color: black;
      }


      /* interaccion botones */
     .rounded:hover{
        background-color: #EBC3C2;
      }

      .btn:hover{
        background-color:#EBC3C2;
        border-color:#EBC3C2;;
      }

      .nav-link:hover{
        color:#f19694;
      }

      /* primer container div dos colores */
      .perfil_view{
        margin-left: 10.5%;
        background-image: linear-gradient(to bottom,#DDA09E 50%, #FFF5F5 50%);
        margin-top: 10%;
        border-radius: 30px;
        position: relative;
      }

      .photo{
        background-color: white;
        position: absolute;
        margin: auto;
        width: 11%;
        height: 55%;
        border-radius: 90px;
      }
      /*para poner imagen de perfil  */
      .change_ph{
        margin-left: 80%;
        margin-top: 17%;
      }
      /* inputs para nombre, correo y contraseña */
      .profile_data{
        margin-top: 5.5%;
        margin-left: 10%;
      }

      .name{
        width: 40%;
      }

      #btn{
        margin-top: 24%;
      }
      /*diseño botones  */
     .cancel{
      border-color: #A57268;
      color: #A57268;
     }
     
     .save{
      background-color: #DDA09E ;
      color: #FFFF;
      border-color: #DDA09E;
     }
     /* linea horizontal */
     .line{
      width: 79%;
      margin: auto;
      margin-top: 30px;
     }
     /*container display de editar  */
     .modal-content{
      background-color: #FAEEEE;
     }

     .hide_menu{
      display: none;
     }

     /*Responsividad de menu izquierdo  */
     @media (min-width: 375px) and (max-width: 769px) { 
      /*mostrar menu con boton */
      .hide_menu{
        display: block;
      }

      .hide{
        background-color: #DDA09E;
        border-color:#DDA09E;
      }
      /*modificar tamaño del ancalaje a */
      .p-1{
        width: 23vw;
      }
      /*ocultar menu principal  */
      .left{
        display: none;
      }

      .offcanvas{
        background-color: #FAEEEE;
      }
    
     }

     .search{
      margin-left: 90px;
     }
   
  
    </style>

<body>
   <!-- Primer contenido de menu de izquierda -->
  <div class="container-fluid">

    <div class="row">
              <div class="col-1 left">
                      <div id="simple-list-example" class="d-flex flex-column gap-5 simple-list-example-scrollspy text-center">
                          <a class="p-1 rounded" href="./index_main.html">Mi perfil </a>
                          <a class="p-1 rounded" href="./menu compras/index_compras.html">Compras </a>
                          <a class="p-1 rounded" href="#simple-list-item-3">Salir</a>
                      </div>

                      
              </div>
              <!-- Menu desplegable izquierdo -->
                      <div class="hide_menu">
                        <button class="btn btn-primary hide" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                          Menu
                        </button>
                          <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                            <div class="offcanvas-header">
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                              <div>
                                <div class="row">
                                  <div class="col-1">
                                          <div id="simple-list-example" class="d-flex flex-column gap-5 simple-list-example-scrollspy text-center">
                                            <img src="../assets/logo_humo_rosa-removebg-preview.png" alt="logo humo rosa" height="80"/>
                                              <a class="p-1 rounded" href="./index_main.html">Mi perfil </a>
                                              <a class="p-1 rounded" href="./menu compras/index_compras.html">Compras </a>
                                              <a class="p-1 rounded" href="#simple-list-item-3">Salir</a>
                                            </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
              </div>

               <!-- Menu pestañas -->
                  <nav class="navbar d-flex justify-content-center mt-4">
                      <ul class="nav nav-underline">
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="./index_main.html">Mi perfil</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="./menu compras/index_agregar_direccion.html">Mis direcciones</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="./menu compras/index_sin_pago.html">Billetera</a>
                        </li>
                      </ul>
                        <div class="search">
                          <form class="d-flex" role="search">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success save" type="submit">Search</button>
                          </form>
                        </div>
                  </nav>

                   <!-- imagen de perfil -->
              <div class="col-11">
                <div class="perfil_view">
                    <div class="photo container text-center">
                      <img src="" alt=""/>
                    </div>
                  <button type="button" class="btn change_ph">Cambiar foto</button>
                </div>
              </div>
    </div>
     <!-- input de nombre -->
  </div>
    <div class="row">
      <div class="col-6 profile_data ">
        <p>Nombre</p>
        <input class="form-control me-2 name" type="search" placeholder="Tu nombre" aria-label="search">
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-outline-primary cancel" id="btn">Cancelar</button>
        <button type="button" id="btn" class="btn btn-primary save">
          Guardar cambios
        </button>
      </div>
      <hr class="line">
       <!--input de correo electrónico -->
      <div class="col-6 profile_data">
        <p>Correo electrónico</p>
        <p>alan_escream99@hotmail.com</p>
      </div>
       <!-- boton con menu desplegable -->
      <div class="col-4">      
        <button type="button" id= "btn" class="btn btn-primary save" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Editar</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1>Cambiar email de inicio de sesión</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <small class="text-body-secondary">Si iniciaste sesión con Google o Facebook, usa este nuevo email para seguir iniciando sesión de esa manera..</small>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nuevo email:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Confirmar email:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Tu contraseña:</label>
                    <input type="text" class="form-control" id="recipient-name">
                    <small class="text-body-secondary"><a href="" >¿Olvidaste tu contraseña?</a></small>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary save" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary save">Cambiar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="line">
       <!-- input de contraseña -->
      <div class="col-6 profile_data">
        <p>Contraseña</p>
        <p>**********</p>
      </div>
       <!-- boton con menu desplegable -->
      <div class="col-4">
        <button type="button" id= "btn" class="btn btn-primary save" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Editar</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1>Cambiar contraeña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form>
                  <small class="text-body-secondary">Si iniciaste sesión con Google o Facebook, usa este nuevo email para seguir iniciando sesión de esa manera..</small>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Tu correo:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nueva contraseña:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Confirmar contraseña:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary save" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary save">Cambiar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="line">


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

 <!-- codigo que me copie de bootsrap que no entiendo -->
    <script>
    
    const exampleModal = document.getElementById('exampleModal')
    if (exampleModal) {
      exampleModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an Ajax request here
        // and then do the updating in a callback.
    
        // Update the modal's content.
        const modalTitle = exampleModal.querySelector('.modal-title')
        const modalBodyInput = exampleModal.querySelector('.modal-body input')
    
        modalTitle.textContent = `New message to ${recipient}`
        modalBodyInput.value = recipient
      })
    }

  </script>
</body>
@endsection