@extends('layouts.navbar_dashboard') <!-- Puedes cambiar el layout por el que corresponda a tu proyecto -->

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <h1 class="alert alert-success">Proveedores</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <!-- Botón para abrir el modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                Agregar Proveedor
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="row justify-content-center mt-3">
            <div class="col-4 text-center">
                <p class="alert alert-success">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col" class="bg-success-subtle">#</th>
                    <th scope="col" class="bg-success-subtle">Nombre</th>
                    <th scope="col" class="bg-success-subtle">Dirección</th>
                    <th scope="col" class="bg-success-subtle text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedores as $proveedor)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td> <!-- Índice del proveedor -->
                        <td>{{ $proveedor->Nombre }}</td>
                        <td>{{ $proveedor->Direccion }}</td>
                        <td class="text-center">
                            <a class="btn btn-warning me-2" href="{{ route('proveedores.edit', $proveedor->Id_proveedor) }}">
                                Editar
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedor->Id_proveedor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar este proveedor?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para Crear Proveedor -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Crear Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('proveedores.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="Direccion" class="form-label">Dirección</label>
                            <textarea class="form-control" id="Direccion" name="Direccion"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
