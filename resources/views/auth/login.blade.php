<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/floating-labels.css') }}">
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div id="app">
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="text-center mb-4">
                    <img class="mb-4" src="https://styde.net/wp-content/themes/styde/img/styde-w-o.png" alt="StydeNet">
                    <h1 class="h3 mb-3 font-weight-normal">Curso de Docker</h1>
                    <p>
                        Curso de Docker para Developers y DevOps disponible en
                        <a href="https://styde.net/curso-de-docker" target="_blank">https://styde.net/curso-de-docker</a>
                    </p>
                </div>

                <div class="form-label-group">
                    <input type="text" id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                           placeholder="Usuario" name="username" value="{{ old('username') }}" autofocus>
                    <label for="username">{{ __('Usuario') }}</label>

                    @if($errors->has('username'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-label-group">
                    <input type="password" id="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password" placeholder="Password">
                    <label for="password">{{ __('Contraseña') }}</label>

                    @if($errors->has('password'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Recordar mis datos
                    </label>
                </div>
                <button class="btn btn-lg btn-login btn-block" type="submit">Iniciar</button>
            </form>
        </div>
    </div>
</body>
</html>
