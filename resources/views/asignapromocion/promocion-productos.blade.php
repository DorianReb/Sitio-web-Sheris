@extends('layouts.navbar_landing_page')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4 text-morena fw-bold">
            Productos con la promoción: {{ $promociones->nombre }}
        </h2>

        <div class="row g-4">
            @foreach ($productos as $producto)
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <div class="d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $producto->imagen) }}"
                                 class="w-100 h-auto"
                                 alt="{{ $producto->alt_imagen ?? $producto->nombre }}">
                        </div>
                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title fw-bold text-morena">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ $producto->Descripcion }}</p>
                            @if ($producto->promociones->count() > 0)
                                @php
                                    $promocion = $producto->promociones->first();
                                    $descuento = $promocion->descuento;
                                    $precioOriginal = $producto->precio;
                                    $precioDescuento = $precioOriginal * (1 - $descuento / 100);
                                @endphp
                                <p>
                                    <span style="text-decoration: line-through; color: gray;">${{ number_format($precioOriginal, 2) }} MXN</span>
                                    <span class="fw-bold ms-2">${{ number_format($precioDescuento, 2) }} MXN</span>
                                    <span style="background-color: red; color: white; padding: 2px 6px; border-radius: 4px; font-weight: bold; margin-left: 10px;">
            -{{ $descuento }}%
        </span>
                                </p>
                            @else
                                <p class="fw-bold">${{ number_format($producto->precio, 2) }} MXN</p>
                            @endif
                            <!-- Botón Ver Producto que redirige a productos.show -->
                            <a href="{{ route('productos.show', $producto->id_producto) }}"
                               class="btn btn-light text-morena mt-auto">
                                Ver Producto
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación si es que usas -->
        <div class="mt-4">
            {{ $productos->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
