@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Ventas</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createVentaModal">
                <i class="fa-solid fa-plus"></i> Crear Nueva Venta
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
                    <th>ID Venta</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ventas as $venta)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $venta->fecha }}</td>
                        <td>{{ $venta->cliente->nombre ?? 'Sin cliente' }}</td>
                        <td>{{ $venta->producto->nombre ?? 'Sin producto' }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        <td>${{ number_format($venta->precio_unitario, 2) }}</td>
                        <td>${{ number_format($venta->total, 2) }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editVentaModal{{ $venta->id_venta }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </button>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('ventas.destroy', $venta->id_venta) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta venta?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de edición venta -->
                    @include('venta.edit', ['venta' => $venta, 'clientes' => $clientes, 'productos' => $productos])
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de creación venta -->
    @include('venta.create', ['clientes' => $clientes, 'productos' => $productos])

@endsection
