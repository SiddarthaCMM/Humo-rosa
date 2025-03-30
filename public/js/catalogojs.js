function marcarActivo(event) {
    let botones = document.querySelectorAll(".catalogoButton");
    
    botones.forEach(boton => {
        boton.classList.remove('activo');
    });

    let botonSeleccionado = event.target;
    botonSeleccionado.classList.add('activo');
    
    // Obtener la categoría del botón seleccionado
    let categoria = botonSeleccionado.textContent.trim();

    // Obtener todos los productos
    var productos = document.querySelectorAll('#objectsSection .card');

    // Mostrar u ocultar productos según la categoría seleccionada
    productos.forEach(function(producto) {
        if (categoria === 'Todo' || producto.getAttribute('data-categoria') === categoria) {
            producto.style.display = 'block'; // Mostrar producto
        } else {
            producto.style.display = 'none'; // Ocultar producto
        }
    });
}