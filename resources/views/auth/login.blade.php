@extends('layouts.app')

@section('content')  
<link rel="stylesheet" href="{{ asset('css/stylesLogInRegister.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<body class="login-page">
        <div class="login-container">
            <h1>¡Bienvenido!</h1>
            <h2>Iniciar Sesion</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form-check">
                        <label class="labelRecuerdame">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Recuerdame
                        </label>
                    </div>

                    <button id="submitButton" type="submit">{{ __('Login') }}</button>
                
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
            </form>
            <p>O continua con</p>
            <div class="social-login">
                <button class="google">G</button>
                <button class="facebook">f</button>
                <button class="apple"></button>
            </div>

            <div>
                <div class="user"><span class="newUser">¿Olvidaste tu contraseña?</span></div>
            </div>
        </div> 
        
        <div class ="register-container">
            <h1>¡Bienvenido!</h1>
            <h2>Registrate</h2>
            <form method="POST" action="{{ route('register') }}">
            @csrf
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="usuario">Usuario</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="contrasena">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <label for="contrasena">Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <button type="submit">
                                    {{ __('Register') }}
                </button>
            </form>
            <div class="user">¿Ya tienes cuenta? <span class="existingUser">Inicia Sesion</span></div>
        </div>

        <script>
            function togglePassword() {
                var passwordInput = document.getElementById("contrasena");
                var toggleBtn = document.getElementById("togglePassword");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleBtn.textContent = "🙈";
                } else {
                    passwordInput.type = "password";
                    toggleBtn.textContent = "👁";
                }
            }
        </script>    

        <script src="{{ asset('js/loginAnimation.js') }}" defer></script>
@endsection