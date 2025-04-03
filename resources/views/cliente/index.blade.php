@extends('layouts.navbar_dashboard')

@section('content')
<div class="container">
    <h1>Lista de Clientes</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Crear Nuevo Cliente</button>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->Id_cliente }}</td>
                    <td>{{ $cliente->contacto->Correo ?? 'Sin contacto' }}</td>  <!-- Nombre del contacto corregido a Correo -->
                    <td>{{ $cliente->contacto->Telefono ?? 'N/A' }}</td>
                    <td>{{ $cliente->contacto->Correo ?? 'N/A' }}</td> <!-- Correo de contacto -->
                    <td>{{ $cliente->Direccion_cliente ?? 'No registrada' }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $cliente->Id_cliente }}">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </button>

                        <form action="{{ route('clientes.destroy', $cliente->Id_cliente) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>

                @include('cliente.edit', ['cliente' => $cliente])
            @endforeach
        </tbody>
    </table>
</div>

@include('cliente.create')

@endsection

