<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Cambia el campo por el que se hace login: 'name' en vez de 'email'
    public function username()
    {
        return 'name';
    }

    // Después del login exitoso
    protected function authenticated(Request $request, $user)
    {
        return redirect('/')->with('status', 'Inicio de sesión exitoso.');
    }

    // Cuando el login falla
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->with('error', 'Usuario o contraseña incorrectos.');
    }
}