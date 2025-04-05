@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Productos</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa-solid fa-plus"></i> Crear Nuevo Producto
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-4">
                <p class="alert alert-success mt-2">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Alt Imagen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->Id_producto }}</td>
                        <td>{{ $producto->Nombre }}</td>
                        <td>${{ number_format($producto->Precio, 2) }}</td>
                        <td>{{ $producto->Stock }}</td>
                        <td>{{ $producto->categoria->Nombre ?? 'Sin Categoría' }}</td>
                        <td>
                            @if($producto->Imagen)
                                <img src="{{ asset('storage/' . $producto->Imagen) }}" alt="{{ $producto->Alt_imagen }}" width="70" height="70" class="img-thumbnail">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $producto->Alt_imagen ?? 'Sin descripción' }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $producto->Id_producto }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </button>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('productos.destroy', $producto->Id_producto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de edición -->
                    @include('producto.edit', ['producto' => $producto])
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de creación -->
    @include('producto.create')

@endsection
