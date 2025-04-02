<div class="modal fade" id="editModal{{ $promocion->Id_promocion }}" tabindex="-1" aria-labelledby="editModalLabel{{ $promocion->Id_promocion }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $promocion->Id_promocion }}">Editar Promoción</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('promociones.update', $promocion->Id_promocion) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $promocion->Nombre }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="Descripcion" name="Descripcion">{{ $promocion->Descripcion }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="Imagen" name="Imagen">
                        @if($promocion->Imagen)
                            <img src="{{ asset('storage/' . $promocion->Imagen) }}" class="img-fluid mt-2" width="150">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="Descuento" class="form-label">Descuento (%)</label>
                        <input type="number" class="form-control" id="Descuento" name="Descuento" min="0" max="100" value="{{ $promocion->Descuento }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="Fecha_inicio" name="Fecha_inicio" value="{{ $promocion->Fecha_inicio }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Fecha_final" class="form-label">Fecha de Finalización</label>
                        <input type="date" class="form-control" id="Fecha_final" name="Fecha_final" value="{{ $promocion->Fecha_final }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

