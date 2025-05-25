<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <title>{{ config('app.name', 'Sheris') }}</title>

    <!-- Bootstrap y estilos -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Menú lateral pegado a la izquierda -->
        <div class="col-2 bg-morena text-light min-vh-100 d-flex flex-column p-3">
            <a href="{{ url('/home') }}" class="text-light fw-bold text-decoration-none">
            <h5 class="fw-bold">Menú</h5>
            </a>
            <ul class="nav flex-column flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('categorias.index') }}"><i class="fa-solid fa-th-large"></i>
                        Categorías
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('proveedores.index') }}"><i class="fa-solid fa-truck-loading"></i>
                        Proveedores</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('productos.index') }}"><i class="fa-solid fa-box"></i>
                        Productos</a></li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('puestos.index') }}"><i class="fa-solid fa-users"></i>
                        Puestos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('contactos.index') }}"><i class="fa-solid fa-address-book"></i>
                        Contactos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('estado_reparto.index') }}">
                        <i class="fa-solid fa-cogs"></i> Estados de Reparto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('metodo_pago.index') }}">
                        <i class="fa-solid fa-wallet"></i> Métodos de Pago
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link text-light fw-bold" href="{{ route('promociones.index') }}"><i class="fa-solid fa-gift"></i>
                        Promociones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('empleados.index') }}">
                        <i class="fa-solid fa-user-tie"></i> Empleados
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('clientes.index') }}">
                        <i class="fa-solid fa-user"></i> Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('asignapromocion.index') }}">
                        <i class="fa-solid fa-tags"></i> Asignar Promociones
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light fw-bold" href="{{ route('ventas.index') }}">
                        <i class="fa-solid fa-shopping-cart"></i> Ventas
                    </a>
                </li>
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
