@extends('layouts.navbar_dashboard')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Crear Nuevo Producto</button>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
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
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $producto->Id_producto }}">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </button>

                        <form action="{{ route('productos.destroy', $producto->Id_producto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>

                @include('producto.edit', ['producto' => $producto])
            @endforeach
        </tbody>
    </table>
</div>

@include('producto.create')

@endsection
