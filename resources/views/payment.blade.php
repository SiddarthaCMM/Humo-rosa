@extends('layouts.app')

@section('content')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cartpay.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">

    <style>
    .container-fluit{
        background-color: #dbb5b4;
        
    }

    .nav-link{
        font-family: "Onest", serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        color: white;
    }

    .nav-link:hover{
        color: #f06f8f
    }

   
    .svg{
        border-radius: 150%;
        width: 40px;
        height: 40px;
        border-color: #A57268;
        background-color: #F6D8D7;
    }

    .svg:hover{
        background-color: #f06f8f;
        border-color: #f06f8f;
    }

    .dropdown-toggle{
        border-radius: 20px;
        border-color: #A57268;
        color: #A57268;
        background-color: #F6D8D7;
    }

    .dropdown-toggle:hover{
        background-color: #f06f8f;
        border-color: #f06f8f;
    }
 
    
</style>

<body>

    <div class="container-sm sized">
        <div class="container-sm sizedcolor col-7" style="padding-bottom: 20px; padding-top: 30px;">
            <p>Mi carrito</p>
            <hr>
            @foreach ($cartProducts as $product)
            <div class="container-sm sized" id="product-{{ $product->id }}" style="margin-bottom: 20px;">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="height: 300px; width: 264px; object-fit: cover; border-radius: 30px">
                
                <div class="container-sm" style="padding-top: 8%; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <div class="container-sm" style="width: 100%;">
                        <p style="color: black;">{{ $product->name }}</p>
                        <p style="color: red;">${{ number_format($product->price, 2) }}</p>
                    </div>
                
                    <div class="input-group" style="width: 120px; display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-outline-secondary btn-decrement" data-product-id="{{ $product->id }}" type="button">-</button>
                        <input type="text" id="quantity-{{ $product->id }}" class="form-control text-center" value="{{ $product->quantity }}" readonly>
                        <button class="btn btn-outline-secondary btn-increment" data-product-id="{{ $product->id }}" type="button">+</button>
                    </div>
                
                    <a href="#" style="width: 100%; text-decoration: none; text-align: center;" onclick="removeFromCart({{ $product->id }})">Eliminar</a>
                </div>
            </div>
            @endforeach
        </div> 

        <div class="container-sm col-1">
        </div> 
    
    <!-- Subtotal -->
        <div class="container-sm sizedcolor col-4" style="padding-bottom: 20px; padding-top: 30px;">
            <p>Resumen de la compra</p>
            <hr>
            <div class="container-sm sized">
                <p class="col-8">Subtotal</p><p class="col-4" style="color: red;">${{ number_format($subtotal, 2) }}</p>
            </div> 
            <a href="">Durango, México</a>

            <hr>

            <!-- Impuestos -->
            <div class="container-sm sized">
                <p class="col-8">Impuestos (16%)</p><p class="col-4" style="color: red;">${{ number_format($tax, 2) }}</p>
            </div> 

            <hr>

            <div class="container-sm sized">
                <p class="col-8">Total</p><p class="col-4" style="color: red;">${{ number_format($total, 2) }}</p>
            </div> 

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button" style="background-color: #DCB9B2;">Realizar Pago</button>
            </div>
        </div>

    </div> 

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    // Delegación de eventos para los botones de incremento
    $('.container-sm.sizedcolor').on('click', '.btn-increment', function() {
        var productId = $(this).data('product-id'); // Obtener el ID del producto
        var quantityInput = $('#quantity-' + productId); // Obtener el input de cantidad
        var currentQuantity = parseInt(quantityInput.val()); // Obtener la cantidad actual

        // Incrementar la cantidad y actualizar el input
        var newQuantity = currentQuantity + 1;
        quantityInput.val(newQuantity);
        
        // Llamar a la función para actualizar el carrito en el backend
        updateCartQuantity(productId, newQuantity);
    });

    // Delegación de eventos para los botones de decremento
    $('.container-sm.sizedcolor').on('click', '.btn-decrement', function() {
        var productId = $(this).data('product-id'); // Obtener el ID del producto
        var quantityInput = $('#quantity-' + productId); // Obtener el input de cantidad
        var currentQuantity = parseInt(quantityInput.val()); // Obtener la cantidad actual

        // Decrementar la cantidad solo si es mayor que 1
        if (currentQuantity > 1) {
            var newQuantity = currentQuantity - 1;
            quantityInput.val(newQuantity);
            
            // Llamar a la función para actualizar el carrito en el backend
            updateCartQuantity(productId, newQuantity);
        }
    });

    // Función para actualizar el carrito en el backend
    function updateCartQuantity(productId, quantity) {
        $.ajax({
            url: '/update-cart/' + productId,  // Ruta para actualizar la cantidad en el backend
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',  // Token CSRF
                quantity: quantity  // Nueva cantidad
            },
            success: function(response) {
                if (response.success) {
                    // Después de actualizar el carrito, obtenemos el resumen del carrito actualizado
                    updateCartSummary(); // Actualiza el resumen sin recargar la página
                } else {
                    console.log('Error al actualizar la cantidad');
                }
            },
            error: function() {
                console.log('Error al actualizar el carrito');
            }
        });
    }

    // Función para obtener y actualizar el resumen del carrito
    function updateCartSummary() {
    $.ajax({
        url: "/get-cart-summary",  // La URL de la nueva vista
        method: "GET",
        success: function(data) {
            $("#cart-summary").html(data); // 🔹 Actualiza el resumen del carrito con la vista renderizada
        },
        error: function(xhr, status, error) {
            console.error("Error al obtener el resumen del carrito:", error);
        }
    });
    }
});

function removeFromCart(productId) {
    $.ajax({
        url: '/remove-from-cart/' + productId,  // URL de la ruta para eliminar el producto
        method: 'POST',  // Método HTTP
        data: {
            _token: '{{ csrf_token() }}',  // Token de CSRF para proteger el POST
        },
        success: function(response) {
            if (response.success) {
                // Eliminar el producto del carrito en la interfaz de usuario
                $('#product-' + productId).remove();  // Eliminar el producto del HTML (suponiendo que cada producto tiene un ID como "product-{id}")
                console.log('Producto eliminado con éxito');
            }
        },
        error: function() {
            console.log('Error al eliminar el producto');
        }
    });

    // Llamar a la función de actualización de resumen cuando se cargue la página
$(document).ready(function() {
        updateCartSummary();
    });
}
</script>
</body>
@endsection
