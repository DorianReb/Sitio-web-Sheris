@extends('layouts.navbar_dashboard')

@section('content')
<div class="container">
    <h1>Lista de Ventas</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Registrar Nueva Venta</button>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Empleado</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->Id_venta }}</td>
                    <td>{{ $venta->Fecha }}</td>
                    <td>{{ $venta->empleado->Nombre ?? 'No asignado' }}</td>
                    <td>{{ $venta->cliente->Nombre ?? 'No asignado' }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $venta->Id_venta }}">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </button>

                        <form action="{{ route('ventas.destroy', $venta->Id_venta) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta venta?')">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>

                @include('venta.edit', ['venta' => $venta])
            @endforeach
        </tbody>
    </table>
</div>

@include('venta.create')

@endsection
