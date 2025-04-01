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

document.addEventListener('DOMContentLoaded', function() {
    // Obtener el parámetro 'categoria' de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const categoriaSeleccionada = urlParams.get('categoria') || 'Todo';  // Si no hay 'categoria', se asigna 'Todo'

    // Mostrar u ocultar productos según la condición 'Todo' o el valor del 'data-categoria'
    var productos = document.querySelectorAll('#objectsSection .card');

    productos.forEach(function(producto) {
        // Mostrar los productos si la condición se cumple o si la categoría es 'Todo'
        if (categoriaSeleccionada === 'Todo' || producto.getAttribute('data-categoria') === categoriaSeleccionada) {
            producto.style.display = 'block'; // Mostrar producto
        } else {
            producto.style.display = 'none'; // Ocultar producto
        }
    });

    // También puedes marcar el botón activo en función de la categoría seleccionada
    let botones = document.querySelectorAll(".catalogoButton");
    botones.forEach(boton => {
        if (boton.getAttribute('data-categoria') === categoriaSeleccionada) {
            boton.classList.add('activo');  // Marca el botón como activo
        } else {
            boton.classList.remove('activo');
        }
    });
});