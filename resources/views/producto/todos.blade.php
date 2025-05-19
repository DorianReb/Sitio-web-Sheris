@extends('layouts.navbar_landing_page')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4 text-morena fw-bold">Todos Nuestros Productos</h2>
        <div class="row g-4">
            <form method="GET" action="{{ route('productos.todos') }}" class="mb-4">
                <div class="row g-2 align-items-center justify-content-center">
                    <div class="col-md-3">
                        <select name="categoria" class="form-select">
                            <option value="">-- Todas las Categorías --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->Id_categoria }}" {{ request('categoria') == $categoria->Id_categoria ? 'selected' : '' }}>
                                    {{ $categoria->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="buscar" class="form-control" placeholder="Buscar producto..."
                               value="{{ request('buscar') }}">
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-morena">Buscar</button>
                    </div>
                </div>
            </form>


        @foreach ($productos as $producto)
                <div class="col-md-4">
                    <div class="card h-100 shadow">
                        <div class="d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $producto->Imagen) }}" class="w-100 h-auto" alt="{{ $producto->Alt_imagen ?? $producto->Nombre }}">
                        </div>
                        <div class="card-body d-flex flex-column text-center">
                            <h5 class="card-title fw-bold text-morena">{{ $producto->Nombre }}</h5>
                            <p class="card-text">{{ $producto->Descripcion }}</p>
                            <p class="card-text fw-bold">${{ number_format($producto->Precio, 2) }} MXN</p>
                            <a href="#" class="btn btn-light text-morena mt-auto">Ver Producto</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $productos->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

