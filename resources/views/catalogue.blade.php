@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesCatalogo.css') }}">

<body>

<div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

            <h5 class="modal-title" id="miModalLabel" style="color: white;">Carrito (n item/items)</h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!--Card para poner los objetos en el carrito-->
                <div class="container-sm sized">
                    <img src="https://placehold.co/120x140" alt="">
                    <div class="container-sm">
                        <p>Black Stones Cake</p>
                        <p>$249.99</p>
                        <div class="input-group" style="width: 120px;">
                            <button class="btn btn-outline-secondary" type="button" onclick="decrement()">-</button>
                            <input type="text" id="quantity" class="form-control text-center" value="1" readonly>
                            <button class="btn btn-outline-secondary" type="button" onclick="increment()">+</button>
                        </div>
                    </div>
                </div> 
 
                <hr>
                <!--Resultado del carrito-->
                <div class="container-sm sized">
                    <p class="col-10">Subtotal</p><p class="col-2">$249.99</p>
                </div> 

                <div class="d-grid gap-2">
                    <a href="{{ route('payment') }}" class="btn btn-primary" style="background-color: #DCB9B2;">Ver Carrito</a>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div id="catalogoSorts" class="container-fluid d-flex flex-wrap">
        <button class="catalogoButton" onclick="marcarActivo(event)">Todo</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Velas Anime</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Velas Celebridades</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Velas Aromáticas</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Cosmética Natural</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Personalizados</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">De temporada</button>
    </div>

    <div id="objectsSection" class="container-fluid d-flex flex-wrap">
        <div class="card">
            <img src="https://placehold.co/180x130" class="img-fluid" alt="Producto 1">
            <div class="p-2 text-center">
                <p style="color: #A57268;">Vasito de Fresa</p>
                <p style="color: #FF0000;">$249.99</p>
                <div class="button-buy">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                            <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="https://placehold.co/180x130" class="img-fluid" alt="Producto 2">
            <div class="p-2 text-center">
                <p style="color: #A57268;">Vasito de Chocolate</p>
                <p style="color: #FF0000;">$199.99</p>
                <div class="button-buy">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                            <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="https://placehold.co/180x130" class="img-fluid" alt="Producto 3">
            <div class="p-2 text-center">
                <p style="color: #A57268;">Vasito de Mango</p>
                <p style="color: #FF0000;">$219.99</p>
                <div class="button-buy">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                            <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="card">
            <img src="https://placehold.co/180x130" class="img-fluid" alt="Producto 3">
            <div class="p-2 text-center">
                <p style="color: #A57268;">Vasito de Mango</p>
                <p style="color: #FF0000;">$219.99</p>
                <div class="button-buy">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                            <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card">
            <img src="https://placehold.co/180x130" class="img-fluid" alt="Producto 3">
            <div class="p-2 text-center">
                <p style="color: #A57268;">Vasito de Mango</p>
                <p style="color: #FF0000;">$219.99</p>
                <div class="button-buy">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                            <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        

    </div>

    <div class="container-fluid" id="gradient-background">
        <footer class="py-5">
          <div class="row">
            <div class="col-6 col-md-2 mb-3">
              <h5>Menu</h5>
              <ul class="flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Nuevos productos</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Más vendidos</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Vistos recientemente</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Populares de esta semana</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Todos los productos</a></li>
              </ul>
            </div>
      
            <div class="col-6 col-md-2 mb-3">
              <h5>Categorias</h5>
              <ul class="flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Velas</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Cosmética natural</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Paquetes</a></li>
            </div>
      
            <div class="col-6 col-md-2 mb-3">
              <h5>Nuestra compañia</h5>
              <ul class="flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Sobre nosotras</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Contactanós</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Privacidad</a></li>
              </ul>
            </div>
      
            <div class="col-md-5 offset-md-1 mb-3">
              <form>
                <h5>Recibe las últimas noticias, los últimos productos y consejos sobre como utilizar nuestras velas para maximizar su vida útil.</h5>
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
                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bii bi-facebook" viewBox="0 0 16 16">
                 <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                 </svg>
                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bii bi-instagram" viewBox="0 0 16 16">
                 <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                 </svg>
                 <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bii bi-pinterest" viewBox="0 0 16 16">
                 <path d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0"/>
                  </svg>
            </ul>
          </div>
        </footer>
      </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/catalogojs.js') }}" defer></script>
</body>
@endsection