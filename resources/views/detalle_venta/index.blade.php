@extends('layouts.navbar_dashboard')

@section('content')
<div class="container">
    <h1>Lista de Detalles de Venta</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Agregar Detalle de Venta</button>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Venta</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->Id_detalle }}</td>
                    <td>{{ $detalle->venta->Id_venta }}</td>
                    <td>{{ $detalle->producto->Nombre }}</td>
                    <td>{{ $detalle->Cantidad }}</td>
                    <td>${{ number_format($detalle->Precio_unitario, 2) }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $detalle->Id_detalle }}">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </button>
                        
                        <form action="{{ route('detalle_ventas.destroy', $detalle->Id_detalle) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este detalle de venta?')">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @include('detalle_venta.edit', ['detalleVenta' => $detalle])
            @endforeach
        </tbody>
    </table>
</div>

@include('detalle_venta.create')
@endsection