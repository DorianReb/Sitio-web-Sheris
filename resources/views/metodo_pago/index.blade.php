@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Métodos de Pago</h1>
            <button type="button" class="btn btn-success shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#formModal">
                <i class="fa-solid fa-plus"></i> Agregar Método de Pago
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
                    <th>ID</th>
                    <th>Método de Pago</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($metodos_pago as $metodo_pago)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{ $metodo_pago->metodo }}</td>
                        <td>
                            <a class="btn btn-warning shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $metodo_pago->id_metodo_pago }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            <form action="{{ route('metodo_pago.destroy', $metodo_pago->id_metodo_pago) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger shadow-sm rounded-pill" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de Edición -->
                    <div class="modal fade" id="editModal{{ $metodo_pago->id_metodo_pago }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-dark">
                                    <h5 class="modal-title" id="editModalLabel">Editar Método de Pago</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('metodo_pago.update', $metodo_pago->id_metodo_pago) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label for="metodo" class="form-label">Método</label>
                                            <input type="text" class="form-control" name="metodo" value="{{ old('metodo', $metodo_pago->metodo) }}" required>
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

    <!-- Modal para agregar un nuevo método de pago -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="formModalLabel">Formulario de Método de Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('metodo_pago.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="metodo" class="form-label">Método</label>
                            <input type="text" class="form-control" name="metodo" required>
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
            $('form')[0].reset();
        });
    </script>
@endsection
