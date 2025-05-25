<!-- Modal para crear nueva asignación de promoción -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('asignapromocion.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="createModalLabel">Asignar Promoción a Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <!-- Promoción -->
                    <div class="mb-3">
                        <label for="id_promocion" class="form-label">Promoción</label>
                        <select name="id_promocion" id="id_promocion" class="form-select" required>
                            <option value="">Seleccione una promoción</option>
                            @foreach($promociones as $promocion)
                                <option value="{{ $promocion->id_promocion }}">{{ $promocion->nombre }}</option>
                            @endforeach
                        </select>

                    </div>

                    <!-- Producto -->
                    <div class="mb-3">
                        <label for="id_producto" class="form-label">Producto</label>
                        <select name="id_producto" id="id_producto" class="form-select" required>
                            <option value="">Seleccione un producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id_producto }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

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
