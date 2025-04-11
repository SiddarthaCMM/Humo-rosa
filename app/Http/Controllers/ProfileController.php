<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Mostrar la vista de configuración del perfil
    public function showConfiguration()
    {
        $user = Auth::user(); // Obtener el usuario autenticado
        return view('configuration', compact('user')); // Pasar el usuario a la vista
    }

    public function update(Request $request)
    {
        // Validación de datos (nombre, correo y foto)
        $request->validate([
            'name' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'new_email' => 'nullable|email|unique:users,email',
            'confirm_email' => 'nullable|same:new_email',
            'password' => 'required_if:new_email,!=,null|password', // solo para cambio de correo
        
            // Validación para cambio de contraseña
            'current_password' => 'nullable|required_with:new_password|current_password',
            'new_password' => 'nullable|required_with:current_password|min:8|same:confirm_password',
            'confirm_password' => 'nullable|required_with:new_password|same:new_password',
        ],[
            'new_email.unique' => 'Este correo electrónico ya está en uso. Por favor, elige otro.',
            'confirm_email.same' => 'El correo y la confirmación no coinciden.',
            'current_password.current_password' => 'La contraseña actual es incorrecta.',
            'new_password.same' => 'La nueva contraseña y la confirmación no coinciden.',
        ]);
        // Log para verificar qué se mandó
        Log::info('Datos recibidos en la actualización: ', [
            'name' => $request->name,
            'new_email' => $request->new_email,
            'confirm_email' => $request->confirm_email,
            'password' => $request->password,
            'profile_picture' => $request->hasFile('profile_picture') ? 'Archivo recibido' : 'No se envió archivo'
        ]);
    
        // Obtener el usuario autenticado
        $user = Auth::user();
        Log::info('Usuario autenticado: ' . $user->email);
    
        // Si se recibe un nombre y es diferente al actual, actualizarlo
        if ($request->has('name') && $request->name !== $user->name) {
            $user->name = $request->name;
            Log::info('Nombre actualizado a: ' . $user->name);
        }
    
        // Si se recibe un nuevo correo electrónico
        if ($request->has('new_email')) {
            Log::info('Nuevo correo recibido: ' . $request->new_email);
    
            // Verificar que la contraseña ingresada es correcta
            if (!Hash::check($request->password, $user->password)) {
                Log::error('Contraseña incorrecta al intentar cambiar el correo.');
                return back()->withErrors(['password' => 'La contraseña ingresada no es correcta.']);
            }
            Log::info('Contraseña verificada correctamente.');
    
            // Validar que el correo y la confirmación coincidan
            if ($request->new_email !== $request->confirm_email) {
                Log::error('El correo y la confirmación no coinciden.');
                return back()->withErrors(['confirm_email' => 'El correo y la confirmación no coinciden.']);
            }
            Log::info('Correo y confirmación coinciden.');
    
            // Actualizar el correo electrónico
            $user->email = $request->new_email;
            Log::info('Correo actualizado de: ' . $user->email);
        }

        if ($request->filled('current_password') && $request->filled('new_password')) {
            $user->password = bcrypt($request->new_password);
            Log::info('Contraseña actualizada exitosamente.');
        }
    
        // Si se recibe una nueva foto de perfil
        if ($request->hasFile('profile_picture')) {
            // Eliminar la foto anterior si existe
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
                Log::info('Foto anterior eliminada.');
            }
    
            // Subir la nueva foto
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
            Log::info('Nueva foto de perfil subida.');
        }
    
        // Guardar los cambios
        $user->save();
        Log::info('Perfil actualizado correctamente.');
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('configuration')->with('success', 'Perfil actualizado correctamente.');
    }
}