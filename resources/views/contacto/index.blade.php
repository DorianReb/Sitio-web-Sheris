@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Contactos</h1>
            <button type="button" class="btn btn-success shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa-solid fa-plus"></i> Agregar Contacto
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="row justify-content-center mt-3">
            <div class="col-4">
                <p class="alert alert-success mt-2">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <table class="table table-striped table-hover">
                <thead class="table-dark rounded-top">
                <tr>
                    <th>id_contacto</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{ $loop->index +1 }}</td>
                        <td>{{ $contacto->correo }}</td>
                        <td>{{ $contacto->telefono }}</td>
                        <td>

                            <a class="btn btn-warning shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $contacto->id_contacto}}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            <!-- Formulario Eliminar -->
                            <form action="{{ route('contactos.destroy', $contacto->id_contacto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger shadow-sm rounded-pill" type="submit">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    @include('contacto.edit', ['contacto' => $contacto])

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Agregar Contacto -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="createModalLabel">Agregar Contacto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contactos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>

                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#createModal').on('hidden.bs.modal', function () {
            $(this).find('form')[0].reset();
        });
    </script>
@endsection
