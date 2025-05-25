@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Categorías</h1>
            <button type="button" class="btn btn-success shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#formModal">
                <i class="fa-solid fa-plus"></i> Agregar Categoría
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
                <thead class="table-dark rounded-top">
                    <tr>
                        <th>id_categoria </th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            <td>
                                <!-- Modal Editar -->
                                <a class="btn btn-warning shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $categoria->id_categoria }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </a>

                                <!-- Modal de eliminación -->
                                <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger shadow-sm rounded-pill" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal de Edición -->
                        <div class="modal fade" id="editModal{{ $categoria->id_categoria }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-dark">
                                        <h5 class="modal-title fw-bold" id="editModalLabel">Editar Categoría</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('categorias.update', $categoria->id_categoria) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            {{-- Campo Nombre --}}
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
                                            </div>

                                            {{-- Campo Descripción --}}
                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Descripción</label>
                                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $categoria->descripcion) }}" required>
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

    <!-- Modal para agregar una nueva categoría -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="formModalLabel">Formulario de Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
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
        $('#formModal').on('hidden.bs.modal', function () {
            // Limpiar el formulario si es necesario
            $('form')[0].reset();
        });
    </script>
@endsection

