@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/stylesCatalogo.css') }}">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
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

    <div id="catalogoSorts" class="d-flex container-fluid categorias">
        <button class="catalogoButton" onclick="marcarActivo(event)">Todo</button>
        <button class="catalogoButton" onclick="marcarActivo(event)" data-categoria="Anime">Anime</button>
        <button class="catalogoButton" onclick="marcarActivo(event)" data-categoria="Celebridades">Celebridades</button>
        <button class="catalogoButton" onclick="marcarActivo(event)" data-categoria="Aromáticas">Aromáticas</button>
        <button class="catalogoButton" onclick="marcarActivo(event)" data-categoria="Cosmética Natural">Cosmética Natural</button>
        <a href="{{ route('contacto') }}" class="catalogoButton" onclick="marcarActivo(event)">Personalizado</a>
        <button class="catalogoButton" onclick="marcarActivo(event)">Por Temporada</button>
    </div>

    
    <div id="objectsSection" class="container-fluid d-flex flex-wrap">
        @if ($products->isEmpty())
        <p>No hay productos disponibles.</p>
        @else
            <div class="row gap-5 cardz">
                @foreach ($products as $product)
                    <div class="card" data-categoria="{{ $product->category }}">
                      <img class="cardsImg" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                      <div class="p-2 text-center">
                          <p style="color: #A57268;">{{ $product->name }}</p>
                          <p style="color: #FF0000;">${{ number_format($product->price, 2) }}</p>
                      </div>
                      <div class="button-buy">
                        <!-- Enlace para abrir el modal, pasamos el id del producto -->
                        <a href="#" 
                        data-toggle="modal" 
                        data-target="#exampleModal"
                        data-product-id="{{ $product->id }}"
                        data-product-name="{{ $product->name }}"
                        data-product-price="{{ number_format($product->price, 2) }}"
                        data-product-description="{{ $product->description }}"
                        data-product-image="{{ asset('storage/' . $product->image) }}"
                        data-product-category="{{ $product->category }}"
                        data-product-ingredients="{{ $product->ingredients }}"
                        data-product-aroma="{{ $product->aroma }}"
                        data-product-stock="{{ $product->stock }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                            </svg>
                        </a>
                      </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Aqui se agrega el objeto al carrito -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
          </div>
          <div class="modal-body text-left">
            <p><strong>Categoría:</strong> <span id="modal-product-category"></span></p>
            <p><strong>Ingredientes:</strong> <span id="modal-product-ingredients"></span></p>
            <div class="d-flex">
              <img src="" class="img-fluid mx-auto d-block" alt="" id="modal-product-image">
            </div>
            <p><strong>Aroma:</strong> <span id="modal-product-aroma"></span></p>
            <p><strong>Stock:</strong> <span id="modal-product-stock"></span></p>
            <p><strong>Precio:</strong> $<span id="modal-product-price"></span></p>
            <p><strong>Descripción:</strong> <span id="modal-product-description"></span></p>
          </div>
          <div class="modal-footer perso">
            <form id="addToCartForm" method="POST">
                @csrf
                <input type="hidden" id="product-id" name="productId" value="">
                <input type="hidden" id="quantity" name="quantity" value="1">

                <div class="modal-footer perso">
                    <button type="button" class="btn btn-collection2" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-collection2" id="addToCartButton">Agregar al carrito</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    
<div class="container-fluid" id="gradient-background">
    <footer class="py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <ul class="flex-column">
                    <li> 
                    <h5>Menu</h5>
                    </li>
                    <li class="nav-item mb-2"><a href="{{ url('/catalogue') }}"
                            class="nav-link p-0 foot">Todos los productos</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <ul class="flex-column">
                    <li>
                    <h5>Categorias</h5>
                    </li>
                    <li class="nav-item mr-3">
                        <a href="{{ url('/catalogue?categoria=Anime') }}"
                            class="nav-link p-0 foot">Anime</a>
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
                        <a href="{{ url('/catalogue?categoria=Aromáticas') }}"
                            class="nav-link p-0 foot">Aromáticas</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ url('/catalogue?categoria=Todo') }}"
                            class="nav-link p-0 foot">Todo</a>
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
                    <h5 style="color:white;">Recibe las últimas noticias, los últimos productos y consejos sobre como utilizar nuestras velas
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/catalogojs.js') }}" defer></script>
</body>

<script>
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    
    // Extraer los datos del atributo data-
    var name = button.data('product-name');
    var price = button.data('product-price');
    var description = button.data('product-description');
    var image = button.data('product-image');
    var category = button.data('product-category');
    var ingredients = button.data('product-ingredients');
    var aroma = button.data('product-aroma');
    var Contenido = button.data('product-Contenido');
    var stock = button.data('product-stock');
    var productId = button.data('product-id'); // Obtener el ID del producto

    // Actualizar los elementos en el modal
    var modal = $(this);
    modal.find('.modal-title').text(name);
    modal.find('#modal-product-price').text(price);
    modal.find('#modal-product-description').text(description);
    modal.find('#modal-product-image').attr('src', image);
    modal.find('#modal-product-category').text(category);
    modal.find('#modal-product-ingredients').text(ingredients);
    modal.find('#modal-product-aroma').text(aroma);
    modal.find('#modal-product-Contenido').text(Contenido);
    modal.find('#modal-product-stock').text(stock);

    // Asignar el productId al campo oculto del formulario dentro del modal
    modal.find('#product-id').val(productId);
    var button = $(event.relatedTarget);
    var productId = button.data('product-id');
    console.log("ID del producto:", productId);
});

$('#addToCartButton').on('click', function () {
    var modal = $('#exampleModal');
    var productId = modal.find('#product-id').val();
    var quantity = 1;

    $.ajax({
        url: '/cart/add/' + productId + '/' + quantity,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: '¡Producto agregado!',
                text: response.message
            });

            $('#exampleModal').modal('hide'); // Cierra el modal
        },
        error: function (xhr) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Hubo un error al agregar el producto al carrito.',
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
@endsection