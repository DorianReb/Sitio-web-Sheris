<div class="modal fade" id="editModal{{ $asignacion->id_asignapromo }}" tabindex="-1" aria-labelledby="editModalLabel{{ $asignacion->id_asignapromo }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title">Editar Asignación de Promoción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('asignapromocion.update', $asignacion->id_asignapromo) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id_promocion" class="form-label">Promoción</label>
                        <select class="form-control" name="id_promocion" required>
                            <option value="">Seleccione una promoción</option>
                            @foreach($promociones as $promocion)
                                <option value="{{ $promocion->id_promocion }}" {{ $asignacion->id_promocion == $promocion->id_promocion ? 'selected' : '' }}>
                                    {{ $promocion->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_producto" class="form-label">Producto</label>
                        <select class="form-control" name="id_producto" required>
                            <option value="">Seleccione un producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id_producto }}" {{ $asignacion->id_producto == $producto->id_producto ? 'selected' : '' }}>
                                    {{ $producto->nombre }}
                                </option>
                            @endforeach
                        </select>
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
