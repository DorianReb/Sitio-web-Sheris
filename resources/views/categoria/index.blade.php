@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Categorías</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formModal">
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
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de la Categoría</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoria as $categoria)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{ $categoria->Nombre }}</td>
                            <td>{{ $categoria->Descripcion }}</td>
                            <td>
                                <!-- Modal Editar -->
                                <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $categoria->Id_categoria }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </a>

                                <!-- Modal de eliminación -->
                                <form action="{{ route('categorias.destroy', $categoria->Id_categoria) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal de Edición -->
                        <div class="modal fade" id="editModal{{ $categoria->Id_categoria }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Editar Categoría</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('categorias.update', $categoria->Id_categoria) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            {{-- Campo Nombre --}}
                                            <div class="mb-3">
                                                <label for="Nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $categoria->Nombre) }}" required>
                                            </div>

                                            {{-- Campo Descripción --}}
                                            <div class="mb-3">
                                                <label for="Descripcion" class="form-label">Descripción</label>
                                                <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{ old('Descripcion', $categoria->Descripcion) }}" required>
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

    <!-- Modal para agregar una nueva categoría -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Formulario de Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="Descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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

