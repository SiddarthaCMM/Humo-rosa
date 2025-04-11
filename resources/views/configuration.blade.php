@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
    

    <style>
     body{
        background-color:#FAEEEE;
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

        .search{
          margin-left: 90px;
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

        .test{
          border-right-width: thick;
          border-right: solid #CD7E7E;
          height: auto;
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

   <!-- Primer contenido de menu de izquierda -->
  <div class="container-fluid">

    <div class="row">
              <div class="col-1 left test">
                      <div id="simple-list-example" class="d-flex flex-column gap-5 simple-list-example-scrollspy text-center">
                          <a class="p-1 rounded" href="{{ route('configuration') }}">Mi perfil </a>
                          <a class="p-1 rounded" href="{{ route('compras') }}">Compras </a>
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
                                              <a class="p-1 rounded" href="{{ route('configuration') }}">Mi perfil </a>
                                              <a class="p-1 rounded" href="{{ route('compras') }}">Compras </a>
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
                          <a style="color: black" class="nav-link" aria-current="page" href="{{ route('configuration') }}">Mi perfil</a>
                        </li>
                        <li class="nav-item">
                          <a style="color: black" class="nav-link" aria-current="page" href="{{ route('direcciones') }}">Mis direcciones</a>
                        </li>
                        <li class="nav-item">
                          <a style="color: black" class="nav-link" aria-current="page" href="{{ route('billetera') }}">Billetera</a>
                        </li>
                      </ul>
                  </nav>

                   <!-- imagen de perfil -->
                   <div class="col-11">
                      <div class="perfil_view">
                          <!-- Contenedor de la foto de perfil -->
                          <div class="photo container text-center">
                              <!-- Mostramos la foto de perfil actual, si existe -->
                              <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.png') }}" alt="Foto de perfil" class="img-fluid photo" style="width: 150px; height: 150px; object-fit: cover;">
                          </div>

                          <!-- Formulario para cambiar la foto -->
                          <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')

                              <!-- Input para cargar la nueva foto -->
                              <input type="file" id="profile_picture" name="profile_picture" accept="image/*" style="display: none;" onchange="handleFileChange()">

                              <!-- Botón de "Cambiar foto" que activará el input de archivo -->
                              <button type="button" class="btn change_ph" onclick="document.getElementById('profile_picture').click()">Cambiar foto</button>

                              <!-- Botón de submit para enviar el formulario -->
                              <button type="submit" class="btn btn-primary" style="display: none;" id="submit_button">Actualizar foto</button>
                          </form>
                      </div>
                  </div>
    </div>
     <!-- input de nombre -->
  </div>
    <div class="row">
    <div class="col-6 profile_data">
          <p>Nombre</p>
          <form action="{{ route('profile.update') }}" method="POST" id="update-name-form">
              @csrf
              @method('PUT')
              <!-- Campo de entrada para el nombre -->
              <input class="form-control me-2 name" type="text" placeholder="Tu nombre" name="name" value="{{ $user->name }}" aria-label="search">

              <!-- Botón para guardar cambios de nombre -->
              <button type="submit" class="btn btn-primary save mt-2" id="save-name-btn">Guardar nombre</button>
          </form>
      </div>
      <hr class="line">
       <!--input de correo electrónico -->
       <div class="col-6 profile_data">
            <p>Correo electrónico</p>
            <p>{{ $user->email }}</p>
        </div>
        <!-- Botón con menú desplegable -->

        <div class="col-4">
          <button type="button" id="btn" class="btn btn-primary save" data-bs-toggle="modal" data-bs-target="#exampleModalCorreo">Editar</button>

          <!-- Modal de edición del correo electrónico -->
          <div class="modal fade" id="exampleModalCorreo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                  <div class="modal-content" style="width: 100%; max-width: 500px;">
                      <div class="modal-header">
                          <h1>Cambiar email de inicio de sesión</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <!-- Formulario de actualización de correo -->
                          <form action="{{ route('profile.update') }}" method="POST" id="update-email-form">
                            @csrf
                            @method('PUT')
                            <small class="text-body-secondary">Si iniciaste sesión con Google o Facebook, usa este nuevo email para seguir iniciando sesión de esa manera.</small>
                            <div class="mb-3">
                                <label for="new_email" class="col-form-label">Nuevo email:</label>
                                <input type="text" class="form-control" id="new_email" name="new_email" value="{{ old('new_email', $user->email) }}">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_email" class="col-form-label">Confirmar email:</label>
                                <input type="text" class="form-control" id="confirm_email" name="confirm_email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="col-form-label">Tu contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="text-body-secondary"><a href="#">¿Olvidaste tu contraseña?</a></small>
                            </div>
                            <!-- Botones de guardar y cancelar dentro del formulario -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary save">Cambiar</button>
                            </div>
                        </form>
                      </div>
                  </div>
              </div>
          </div>

          <!-- Popup de error si el email ya está en uso -->
          @if ($errors->has('new_email'))
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script>
                  document.addEventListener('DOMContentLoaded', function () {
                      Swal.fire({
                          icon: 'error',
                          title: '¡Error!',
                          text: '{{ $errors->first('new_email') }}',
                          confirmButtonText: 'Cerrar'
                      });

                      // Reabrir el modal automáticamente si hubo error
                      const modalCorreo = new bootstrap.Modal(document.getElementById('exampleModalCorreo'));
                      modalCorreo.show();
                  });
              </script>
          @endif
        </div>
        <hr class="line">
       <!-- input de contraseña -->
      <div class="col-6 profile_data">
        <p>Contraseña</p>
        <p>**********</p>
      </div>
       <!-- boton con menu desplegable -->
      <div class="col-4">
        <button type="button" id= "btn" class="btn btn-primary save" data-bs-toggle="modal" data-bs-target="#exampleModalContraseña" data-bs-whatever="">Editar</button>
        <div class="modal fade" id="exampleModalContraseña" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1>Cambiar contraeña</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form id="update-password-form" method="POST" action="{{ route('profile.update') }}">
                  @csrf
                  @method('PUT')
                  <small class="text-body-secondary">Si iniciaste sesión con Google o Facebook, puedes establecer una nueva contraseña aquí.</small>
                  <div class="mb-3">
                    <label for="current_password" class="col-form-label">Tu contraseña actual:</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                  </div>
                  <div class="mb-3">
                    <label for="new_password" class="col-form-label">Nueva contraseña:</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                  </div>
                  <div class="mb-3">
                    <label for="confirm_password" class="col-form-label">Confirmar contraseña:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary save" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary save">Cambiar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="line">


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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

    function handleFileChange() {
        const fileInput = document.getElementById('profile_picture');
        const file = fileInput.files[0];
        const validExtensions = ['image/jpeg', 'image/jpg', 'image/png'];

        if (file && !validExtensions.includes(file.type)) {
            // Si el archivo no es de tipo .jpg, .jpeg o .png, mostramos el pop-up de SweetAlert2
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: 'Por favor, sube una imagen en formato JPG, JPEG o PNG.',
                confirmButtonText: 'Cerrar'
            });

            fileInput.value = ''; // Limpiamos el input para que el usuario pueda seleccionar otro archivo
            document.getElementById('submit_button').style.display = 'none'; // Ocultamos el botón de submit
        } else {
            // Si el archivo es válido, mostramos el botón de submit
            document.getElementById('submit_button').style.display = 'inline-block';
        }
    }

        // Obtener el botón y el formulario
    const saveBtn = document.getElementById('save-name-btn');
    const updateNameForm = document.getElementById('update-name-form');

    // Evento para el botón de guardar nombre
    saveBtn.addEventListener('click', function(event) {
        event.preventDefault();  // Prevenir el envío automático del formulario

        // Mostrar el popup de confirmación con SweetAlert2
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Seguro que quieres cambiar tu nombre?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, guardar',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviar el formulario
                updateNameForm.submit();
            }
        });
    });

    document.getElementById('update-email-form').addEventListener('submit', function(e) {
        console.log('Formulario enviado');
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

  @if ($errors->any())
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
          Swal.fire({
              icon: 'error',
              title: '¡Error!',
              text: '{{ $errors->first() }}',
              confirmButtonText: 'Cerrar'
          });
      </script>
  @endif
</body>
@endsection