@extends('layouts.navbar_landing_page')

@section('content')
    <div class="container my-5">
        <h2 class="text-morena fw-bold">{{ $producto->nombre }}</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-fluid" alt="{{ $producto->alt_imagen ?? $producto->nombre }}">
            </div>
            <div class="col-md-6">
                <h4>Descripción</h4>
                <p>{{ $producto->descripcion }}</p>
                <h4>Precio</h4>
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

            </div>
        </div>
        <h3 class="mt-5">Productos relacionados</h3>
        <div class="row">
            @forelse ($productosRelacionados as $prod)
                <div class="col-md-3">
                    <div class="card h-100 shadow">
                        <div class="d-flex align-items-center justify-content-center" style="height: 150px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $prod->imagen) }}" class="w-100 h-auto" alt="{{ $prod->alt_imagen ?? $prod->nombre }}">
                        </div>
                        <div class="card-body text-center">
                            <h6 class="fw-bold text-morena">{{ $prod->nombre }}</h6>
                            <p class="fw-bold">${{ number_format($prod->precio, 2) }} MXN</p>
                            <a href="{{ route('productos.show', $prod) }}" class="btn btn-sm btn-light text-morena">Ver Producto</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>No hay productos relacionados.</p>
            @endforelse
        </div>

    </div>
@endsection
