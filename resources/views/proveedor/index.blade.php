@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Proveedores</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa-solid fa-plus"></i> Agregar Proveedor
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-4">
                <p class="alert alert-success">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedores as $proveedor)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{ $proveedor->Nombre }}</td>
                        <td>{{ $proveedor->Direccion }}</td>
                        <td>
                            <!-- Modal Editar -->
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $proveedor->Id_proveedor }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            <!-- Modal de eliminación -->
                            <form action="{{ route('proveedores.destroy', $proveedor->Id_proveedor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de Edición -->
                    <div class="modal fade" id="editModal{{ $proveedor->Id_proveedor }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Editar Proveedor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('proveedores.update', $proveedor->Id_proveedor) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        {{-- Campo Nombre --}}
                                        <div class="mb-3">
                                            <label for="Nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $proveedor->Nombre) }}" required>
                                        </div>

                                        {{-- Campo Dirección --}}
                                        <div class="mb-3">
                                            <label for="Direccion" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="Direccion" name="Direccion" value="{{ old('Direccion', $proveedor->Direccion) }}" required>
                                        </div>

                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para agregar un nuevo proveedor -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Formulario de Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
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
                            <input type="text" class="form-control" id="Direccion" name="Direccion" required>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Cerrar el modal después de enviar el formulario
        $('#createModal').on('hidden.bs.modal', function () {
            // Limpiar el formulario si es necesario
            $('form')[0].reset();
        });
    </script>
@endsection
