@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Proveedores</h1>
            <button type="button" class="btn btn-success shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#createModal">
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
            <table class="table table-striped table-hover ">
                <thead class="table-dark rounded-top">
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
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>
                            <!-- Modal Editar -->
                            <a class="btn btn-warning shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $proveedor->id_proveedor }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            <!-- Modal de eliminación -->
                            <form action="{{ route('proveedores.destroy', $proveedor->id_proveedor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger shadow-sm rounded-pill" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de Edición -->
                    <div class="modal fade" id="editModal{{ $proveedor->id_proveedor }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-dark">
                                    <h5 class="modal-title" id="editModalLabel">Editar Proveedor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        {{-- Campo Nombre --}}
                                        <div class="mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $proveedor->nombre) }}" required>
                                        </div>

                                        {{-- Campo Dirección --}}
                                        <div class="mb-3">
                                            <label for="direccion" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $proveedor->direccion) }}" required>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning">
                                                <i class="fa-solid fa-check"></i> Actualizar
                                            </button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                <i class="fa-solid fa-xmark"></i> Cancelar
                                            </button>
                                        </div>
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
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="createModalLabel">Formulario de Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('proveedores.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-check"></i> Guardar
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                <i class="fa-solid fa-xmark"></i> Cancelar
                            </button>
                        </div>
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
