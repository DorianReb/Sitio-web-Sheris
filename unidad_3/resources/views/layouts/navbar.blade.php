<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid bg-morena">
        <nav class="navbar navbar-expand-lg bg-body-morena">
            <div class="container-fluid">
              <a class="navbar-brand text-light"  href="#inicio"><img src="{{asset("img/sheris.jpg")}}" class="img-fluid me-2" style="height: 60px" alt="Logo de Sheris todo waos"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#inicio"><span><i class="fa-solid fa-house text-light"></i></span>   Inicio</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="#productos"><i class="fa-solid fa-basket-shopping text-light"></i>  Productos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-light" href="#promociones"><i class="fa-solid fa-tag text-light"></i>  Promociones</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#sobre-nosotros"><span><i class="fa-solid fa-shop text-light"></i></span>   Sobre Nosotros</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#contacto"><span><i class="fa-solid fa-phone text-light"></i></span>   Contacto</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                  <button class="btn btn-light text-morena fw-bold" type="submit">Buscar</button>
                </form>
              </div>
            </div>
          </nav>
    </div>
            @yield('content')
        </main>
    </div>
</body>
</html>