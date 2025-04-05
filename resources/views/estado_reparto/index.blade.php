@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Estados de Reparto</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#formModal">
                <i class="fa-solid fa-plus"></i> Agregar Estado
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
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($estados as $estado)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{ $estado->Estado}}</td>
                        <td>
                            <!-- Botón Editar -->
                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $estado->Id_estado }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>
                            <!-- Formulario Eliminar -->
                            <form action="{{ route('estado_reparto.destroy', $estado->Id_estado) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </form>

                        </td>
                    </tr>

                    <!-- Modal Edición -->
                    <div class="modal fade" id="editModal{{ $estado->Id_estado }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Estado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('estado_reparto.update', $estado->Id_estado) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="Estado" class="form-label">Estado</label>
                                            <select class="form-control" id="Estado" name="Estado" required>
                                                @foreach(\App\Models\EstadoReparto::ESTADOS as $estadoValue)
                                                    <option value="{{ $estadoValue }}" {{ $estadoValue == $estado->Estado ? 'selected' : '' }}>{{ $estadoValue }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
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

    <!-- Modal Agregar Estado -->
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Estado de Reparto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('estado_reparto.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Estado" class="form-label">Estado</label>
                            <select class="form-control" id="Estado" name="Estado" required>
                                @foreach(\App\Models\EstadoReparto::ESTADOS as $estado)
                                    <option value="{{ $estado }}">{{ $estado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#formModal').on('hidden.bs.modal', function () {
            $('form')[0].reset();
        });
    </script>
@endsection
