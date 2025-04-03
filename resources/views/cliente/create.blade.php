<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Crear Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="Id_contacto" class="form-label">Contacto</label>
                        <select class="form-control" id="Id_contacto" name="Id_contacto" required>
                            <option value="">Seleccione un contacto</option>
                            @foreach($contactos as $contacto)
                                <option value="{{ $contacto->Id_contacto }}">{{ $contacto->Correo }}</option> <!-- Corregido a $contacto->Id_contacto y $contacto->Correo -->
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Direccion_cliente" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="Direccion_cliente" name="Direccion_cliente" required>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
