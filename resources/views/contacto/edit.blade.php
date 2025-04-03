<div class="modal fade" id="editModal{{ $contacto->Id_contacto }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('contactos.update', $contacto->Id_contacto) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="Correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="Correo" name="Correo" value="{{ $contacto->Correo }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" value="{{ $contacto->Telefono }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
