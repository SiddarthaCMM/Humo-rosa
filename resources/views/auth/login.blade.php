@php
    app()->instance('login_page', true);
    $fromRegister = old('email') || old('password') || old('password_confirmation');
    $flip = request()->get('view') === 'register' || $fromRegister ? 'flipped' : '';
@endphp


@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/stylesLogInRegister.css') }}">
@endpush

@section('content')
    <a href="{{ url('/') }}" class="logo-login">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
            <line x1="19" y1="12" x2="5" y2="12" />
            <polyline points="12 19 5 12 12 5" />
        </svg>
    </a>


    <div class="flip-container {{ $flip }}" id="flipContainer">

        @if (session('status') || session('error') || $errors->any())
            <div class="modal-overlay" id="alertModal">
                <div class="modal-content">
                    <p>
                        @if (session('status'))
                            {{ session('status') }}
                        @elseif (session('error'))
                            {{ session('error') }}
                        @elseif ($errors->any())
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        @endif
                    </p>
                    <button class="modal-button"
                        onclick="
                            document.getElementById('alertModal').style.display = 'none';
                            document.body.classList.remove('modal-open');

                            const passInput = document.querySelector('input[name=password]');
                            if (passInput) {
                                passInput.focus();
                            } ">Aceptar</button>

                </div>
            </div>
        @endif


        <div class="flipper">

            {{-- FRONT: Iniciar Sesión --}}
            <div class="front form-card">
                <h1>¡Bienvenido!</h1>
                <h2>Iniciar Sesión</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label for="login_name">Usuario</label>
                    <input id="register_name" type="text" name="name" value="{{ old('name') }}" required
                        placeholder="Ingresa tu nombre" autocomplete="username">


                    <label for="login_password">Contraseña</label>
                    <input id="login_password" type="password" name="password" required placeholder="Ingresa tu contraseña"
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


            </div>

            {{-- BACK: Registro --}}
            <div class="back form-card">
                <h1>¡Bienvenido!</h1>
                <h2>Regístrate</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <label for="register_name">Usuario</label>
                    <input id="register_name" type="text" name="name" value="{{ old('name') }}" required
                        placeholder="Ingresa tu nombre" autocomplete="username">


                    <label for="register_email">Email</label>
                    <input id="register_email" type="email" name="email" value="{{ old('email') }}" required
                        placeholder="Ingresa tu email" autocomplete="email">


                    <label for="register_password">Contraseña</label>
                    <input id="register_password" type="password" name="password" required placeholder="Crea una contraseña"
                        autocomplete="new-password">

                    <label for="register_password_confirmation">Confirmar Contraseña</label>
                    <input id="register_password_confirmation" type="password" name="password_confirmation" required
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
