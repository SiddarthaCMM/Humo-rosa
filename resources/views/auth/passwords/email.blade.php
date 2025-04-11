@php
    app()->instance('login_page', true);
    app()->instance('password_reset_page', true);
@endphp

@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/stylesLogInRegister.css') }}">
@endpush

@section('content')
    <a href="{{ route('home') }}" class="logo-login" title="Volver al inicio">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
            <line x1="19" y1="12" x2="5" y2="12" />
            <polyline points="12 19 5 12 12 5" />
        </svg>
    </a>

    <div class="reset-container" id="resetContainer">
        <div class="form-card">

            <h1>¿Olvidaste tu contraseña?</h1>
            <h2>Recupera tu acceso</h2>

            {{-- Modal de éxito --}}
            @if (session('status'))
                <div class="modal-overlay" id="alertModal">
                    <div class="modal-content">
                        <p>{{ session('status') }}</p>
                        <button class="modal-button"
                            onclick="document.getElementById('alertModal').style.display = 'none'; document.body.classList.remove('modal-open');">
                            Aceptar
                        </button>
                    </div>
                </div>
                <script>
                    document.body.classList.add('modal-open');
                </script>
            @endif

            {{-- Modal de error personalizado --}}
            @if ($errors->has('email'))
                @php
                    $errorMsg = $errors->first('email');
                    if ($errorMsg === "We can't find a user with that email address.") {
                        $errorMsg = 'No pudimos encontrar un usuario con ese correo electrónico.';
                    }
                @endphp
                <div class="modal-overlay" id="alertModal">
                    <div class="modal-content">
                        <p>{{ $errorMsg }}</p>
                        <button class="modal-button"
                            onclick="document.getElementById('alertModal').style.display = 'none'; document.body.classList.remove('modal-open');">
                            Aceptar
                        </button>
                    </div>
                </div>
                <script>
                    document.body.classList.add('modal-open');
                </script>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    placeholder="Ingresa tu correo" autocomplete="email" autofocus>

                <button type="submit" class="submitButton">Enviar enlace de recuperación</button>
            </form>

            <div class="user">
                ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
            </div>
        </div>
    </div>
@endsection
