<div class="modal fade" id="editModal{{ $contacto->id_contacto }}" tabindex="-1" aria-labelledby="editModalLabel{{ $contacto->id_contacto }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editModalLabel{{ $contacto->id_contacto }}">Editar Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('contactos.update', $contacto->id_contacto) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="correo{{ $contacto->id_contacto }}" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo{{ $contacto->id_contacto }}" name="correo" value="{{ old('correo', $contacto->correo) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono{{ $contacto->id_contacto }}" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono{{ $contacto->id_contacto }}" name="telefono" value="{{ old('telefono', $contacto->telefono) }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

