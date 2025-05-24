<div class="modal fade" id="editModal{{ $promocion->id_promocion }}" tabindex="-1" aria-labelledby="editModalLabel{{ $promocion->id_promocion }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title" id="editModalLabel{{ $promocion->id_promocion }}">Editar Promoción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('promociones.update', $promocion->id_promocion) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $promocion->nombre }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion">{{ $promocion->descripcion }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="descuento" class="form-label">Descuento (%)</label>
                        <input type="number" class="form-control" id="descuento" name="descuento" min="0" max="100" value="{{ $promocion->descuento }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $promocion->fecha_inicio }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_final" class="form-label">Fecha de Finalización</label>
                        <input type="date" class="form-control" id="fecha_final" name="fecha_final" value="{{ $promocion->fecha_final }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                        @if($promocion->imagen)
                            <img src="{{ asset('storage/' . $promocion->imagen) }}" class="img-fluid mt-2" width="150">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="alt_imagen" class="form-label">Texto Alternativo de la Imagen</label>
                        <input type="text" class="form-control" id="alt_imagen" name="alt_imagen" value="{{ $promocion->alt_imagen }}">
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

