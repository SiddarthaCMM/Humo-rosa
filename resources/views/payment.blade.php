@extends('layouts.app')

@section('content')
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/cartpay.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">


<body>
    <div id="catalogoSorts" class="container-fluid d-flex flex-wrap justify-content-center">
        <button class="catalogoButton" onclick="marcarActivo(event)">Todo</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Velas Anime</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Velas Celebridades</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Velas Aromáticas</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Cosmética Natural</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">Personalizados</button>
        <button class="catalogoButton" onclick="marcarActivo(event)">De temporada</button>
    </div>

    <div class="container-sm sized">
        <div class="container-sm sizedcolor col-7" style="padding-bottom: 20px; padding-top: 30px;">
            <p>Mi carrito</p>
            <hr>
            <div class="container-sm sized">

                <img src="https://placehold.co/200x240" alt="" style="border-radius: 30px;">
                
                <div class="container-sm" style="padding-top: 8%; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <div class="container-sm" style="width: 100%;">
                        <p style="color: black;">Black Stones Cake</p>
                        <p style="color: red;">$249.99</p>
                    </div>
                
                    <div class="input-group" style="width: 120px; display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-outline-secondary" type="button" onclick="decrement()">-</button>
                        <input type="text" id="quantity" class="form-control text-center" value="1" readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="increment()">+</button>
                    </div>
                
                    <a href="" style="width: 100%; text-decoration: none; text-align: center;">Eliminar</a>
                </div>

            </div> 
        </div> 

        <div class="container-sm col-1">
        </div> 

        <div class="container-sm sizedcolor col-4" style="padding-bottom: 20px; padding-top: 30px;">
            <p>Resumen de la compra</p>
            <hr>
            <div class="container-sm sized">
                <p class="col-8">Subtotal</p><p class="col-4" style="color: red;">$249.99</p>
            </div> 
            <a href="">Durango, México</a>

            <hr>

            <div class="container-sm sized">
                <p class="col-8">Total</p><p class="col-4" style="color: red;">$249.99</p>
            </div> 

            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="button" style="background-color: #DCB9B2;">Realizar Pago</button>
            </div>
        </div> 
    </div> 

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/cart.js"></script>
    <script>
        function increment() {
          let qty = document.getElementById("quantity");
          qty.value = parseInt(qty.value) + 1;
        }
      
        function decrement() {
          let qty = document.getElementById("quantity");
          if (parseInt(qty.value) > 1) {
            qty.value = parseInt(qty.value) - 1;
          }
        }
    </script>
</body>
@endsection
