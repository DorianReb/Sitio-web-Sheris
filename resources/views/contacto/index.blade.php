@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Contactos</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa-solid fa-plus"></i> Agregar Contacto
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="row justify-content-center mt-3">
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
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($contactos as $contacto)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contacto->Correo }}</td>
                        <td>{{ $contacto->Telefono }}</td>
                        <td>

                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $contacto->Id_contacto}}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            <!-- Formulario Eliminar -->
                            <form action="{{ route('contactos.destroy', $contacto->Id_contacto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Agregar Contacto -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Agregar Contacto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contactos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="Correo" name="Correo" required>
                        </div>

                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="Telefono" name="Telefono" required>
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
