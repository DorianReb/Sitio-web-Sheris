@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Puestos</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formModal">
                <i class="fa-solid fa-plus"></i> Agregar Puesto
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
                    <th>Descripción</th>
                    <th>Salario Base</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($puestos as $puesto)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{ $puesto->Nombre }}</td>
                        <td>{{ $puesto->Descripcion }}</td>
                        <td>${{ number_format($puesto->Salario_base, 2)}}</td>
                        <td>
                            <!-- Modal Editar -->
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $puesto->Id_puesto }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            <!-- Modal de eliminación -->
                            <form action="{{ route('puestos.destroy', $puesto->Id_puesto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de Edición -->
                    <div class="modal fade" id="editModal{{ $puesto->Id_puesto }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Editar Puesto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('puestos.update', $puesto->Id_puesto) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        {{-- Campo Nombre --}}
                                        <div class="mb-3">
                                            <label for="Nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $puesto->Nombre) }}" required>
                                        </div>

                                        {{-- Campo Descripción --}}
                                        <div class="mb-3">
                                            <label for="Descripcion" class="form-label">Descripción</label>
                                            <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{ old('Descripcion', $puesto->Descripcion) }}" required>
                                        </div>

                                        {{-- Campo Salario Base --}}
                                        <div class="mb-3">
                                            <label for="Salario_base" class="form-label">Salario Base</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="Salario_base" name="Salario_base" value="{{ old('Salario_base', $puesto->Salario_base) }}" required>
                                            </div>
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

    <!-- Modal para agregar un nuevo puesto -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Formulario de Puesto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('puestos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="Descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="Salario_base" class="form-label">Salario Base</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="Salario_base" name="Salario_base" value="{{ old('Salario_base', $puesto->Salario_base) }}" required>
                            </div>
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
        $('#formModal').on('hidden.bs.modal', function () {
            // Limpiar el formulario si es necesario
            $('form')[0].reset();
        });
    </script>
@endsection
