@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Clientes</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa-solid fa-plus"></i> Crear Nuevo Cliente
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
                    <th>id</th>
                    <th>nombre completo</th>
                    <th>correo</th>
                    <th>teléfono</th>
                    <th>dirección</th>
                    <th>acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $cliente->nombre }} {{ $cliente->apellido_p }} {{ $cliente->apellido_m }}</td>
                        <td>{{ $cliente->contacto->correo ?? 'sin correo' }}</td>
                        <td>{{ $cliente->contacto->telefono ?? 'sin teléfono' }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>
                            <!-- Botón editar -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $cliente->id_cliente }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </button>

                            <!-- Botón eliminar -->
                            <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de edición -->
                    @include('cliente.edit', ['cliente' => $cliente])
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de creación -->
    @include('cliente.create')
@endsection
