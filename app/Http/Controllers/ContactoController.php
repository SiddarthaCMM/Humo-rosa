<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // Método para mostrar el formulario
    public function mostrarFormulario()
    {
        return view('contacto');
    }

    // Método para almacenar los datos del formulario
    public function guardarMensaje(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string|max:1000',
        ]);

        // Crear el mensaje
        Mensaje::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'mensaje' => $request->mensaje,
        ]);

        // Redirigir con un mensaje de éxito
        return back()->with('success', 'Mensaje enviado correctamente');
    }
}