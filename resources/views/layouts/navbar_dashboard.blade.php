<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

    <title>{{ config('app.name', 'Sheris') }}</title>

    <!-- Bootstrap y estilos -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Menú lateral pegado a la izquierda -->
        <div class="col-2 bg-morena text-light vh-100 d-flex flex-column p-3">
            <h5 class="fw-bold">Menú</h5>
            <ul class="nav flex-column flex-grow-1">
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('categorias.index') }}"><i class="fa-solid fa-th-large"></i>
                        Categorías</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('proveedores.index') }}"><i class="fa-solid fa-truck-loading"></i>
                        Proveedores</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('productos.index') }}"><i class="fa-solid fa-box"></i>
                        Productos</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('ventas.index') }}"><i class="fa-solid fa-chart-line"></i>
                        Ventas</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('clientes.index') }}"><i class="fa-solid fa-users"></i>
                        Clientes</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('contactos.index') }}"><i class="fa-solid fa-address-book"></i>
                        Contactos</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('inventarios.index') }}"><i class="fa-solid fa-cogs"></i>
                        Inventarios</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('pagos.index') }}"><i class="fa-solid fa-wallet"></i>
                        Pagos</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('promociones.index') }}"><i class="fa-solid fa-gift"></i>
                        Promociones</a></li>
            </ul>

            <!-- Botón de regresar al Landing Page -->
            <a href="{{ url('/') }}" class="btn btn-outline-light w-100 mb-2">
                <i class="fa-solid fa-home"></i> Ir al Inicio
            </a>

            <!-- Botón de Cerrar Sesión al final -->
            <div class="mt-auto">
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light w-100 text-morena">
                        <i class="fa-solid fa-sign-out-alt"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>

        <!-- Contenido principal a la derecha -->
        <div class="col-10 p-4">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</div>
</body>
</html>
