<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Crear Promoción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('promociones.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="Descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Descuento" class="form-label">Descuento (%)</label>
                        <input type="number" class="form-control" id="Descuento" name="Descuento" min="0" max="100" required>
                    </div>

                    <div class="mb-3">
                        <label for="Fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="Fecha_inicio" name="Fecha_inicio" required>
                    </div>

                    <div class="mb-3">
                        <label for="Fecha_final" class="form-label">Fecha de Finalización</label>
                        <input type="date" class="form-control" id="Fecha_final" name="Fecha_final" required>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
