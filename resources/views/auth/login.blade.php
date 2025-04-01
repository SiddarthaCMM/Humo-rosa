@php
    app()->instance('login_page', true);
    $flip = request()->get('view') === 'register' ? 'flipped' : '';
@endphp

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/stylesLogInRegister.css') }}">
@endpush

@section('content')
    <a href="{{ url('/') }}" class="logo-login">
        <img src="{{ asset('assets/logo_humo_rosa-removebg-preview.png') }}" alt="Humo Rosa Logo">
    </a>

    <div class="flip-container {{ $flip }}" id="flipContainer">
        <div class="flipper">

            {{-- FRONT: Iniciar Sesión --}}
            <div class="front form-card">
                <h1>¡Bienvenido!</h1>
                <h2>Iniciar Sesión</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label for="name">Usuario</label>
                    <input id="name" type="text" name="name" required placeholder="Ingresa tu usuario"
                        autocomplete="username">

                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required placeholder="Ingresa tu contraseña"
                        autocomplete="current-password">

                    <div class="remember-container">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Recuérdame</label>
                    </div>

                    <div class="options">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                        @endif
                    </div>

                    <button class="submitButton" type="submit">Iniciar Sesión</button>
                </form>

                <div class="user">
                    ¿No tienes cuenta? <span id="showRegister">Regístrate</span>
                </div>

                <p class="text-muted">O continúa con</p>
                <div class="social-login">
                    <button>G</button>
                    <button>f</button>
                    <button></button>
                </div>
            </div>

            {{-- BACK: Registro --}}
            <div class="back form-card">
                <h1>¡Bienvenido!</h1>
                <h2>Regístrate</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <label for="name">Usuario</label>
                    <input id="name" type="text" name="name" required placeholder="Ingresa tu nombre"
                        autocomplete="username">

                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" required placeholder="Ingresa tu email"
                        autocomplete="email">

                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required placeholder="Crea una contraseña"
                        autocomplete="new-password">

                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required
                        placeholder="Confirma tu contraseña" autocomplete="new-password">

                    <button class="submitButton" type="submit">Registrarse</button>
                </form>

                <div class="user">
                    ¿Ya tienes cuenta? <span id="showLogin">Inicia Sesión</span>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script>
            const flipContainer = document.getElementById('flipContainer');
            const showRegister = document.getElementById('showRegister');
            const showLogin = document.getElementById('showLogin');

            showRegister?.addEventListener('click', () => flipContainer.classList.add('flipped'));
            showLogin?.addEventListener('click', () => flipContainer.classList.remove('flipped'));
        </script>
    @endpush
@endsection
