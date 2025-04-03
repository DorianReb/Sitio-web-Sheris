<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Sheris') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- FontAwesome para iconos -->
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>

    <!-- Bootstrap & Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container-fluid sticky-top bg-morena">
    <nav class="navbar navbar-expand-lg sticky-top bg-body-morena">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#inicio">
                <img src="{{ asset('img/logo-sheris.png') }}" class="img-fluid me-2" style="height: 60px" alt="Logo de Sheris todo waos">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Menú principal -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" href="#inicio"><i class="fa-solid fa-house text-light"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#productos"><i class="fa-solid fa-basket-shopping text-light"></i> Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#promociones"><i class="fa-solid fa-tag text-light"></i> Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#sobre-nosotros"><i class="fa-solid fa-shop text-light"></i> Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#contacto"><i class="fa-solid fa-phone text-light"></i> Contacto</a>
                    </li>
                </ul>

                <!-- Barra de búsqueda -->
                <form class="d-flex me-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                    <button class="btn btn-light text-morena fw-bold" type="submit">Buscar</button>
                </form>

                <!-- Botones de autenticación -->
                <ul class="navbar-nav">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-light fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-light text-morena fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ url('/home#') }}">
                                        <i class="fa-solid fa-cogs"></i> Ir a Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-sign-out-alt"></i> {{ __('Logout') }}
                                    </a>
                                </li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>

<main class="">
    @yield('content')
</main>
</body>
</html>
