function marcarActivo(event) {

    let botones = document.querySelectorAll(".catalogoButton");
    
    botones.forEach(boton => {
        boton.classList.remove('activo');
    });

    let botonSeleccionado = event.target;
    botonSeleccionado.classList.add('activo');
}