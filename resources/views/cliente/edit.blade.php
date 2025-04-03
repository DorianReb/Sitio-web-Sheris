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
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="Telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" required>
                    </div>

                    <div class="mb-3">
                        <label for="Email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="Email" name="Email" required>
                    </div>

                    <div class="mb-3">
                        <label for="Direccion_cliente" class="form-label">Dirección</label>
                        <textarea class="form-control" id="Direccion_cliente" name="Direccion_cliente" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
