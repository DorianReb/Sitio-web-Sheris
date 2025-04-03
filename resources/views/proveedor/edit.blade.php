<div class="modal fade" id="editModal{{ $proveedor->Id_proveedor }}" tabindex="-1" aria-labelledby="editModalLabel{{ $proveedor->Id_proveedor }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $proveedor->Id_proveedor }}">Editar Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('proveedores.update', $proveedor->Id_proveedor) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $proveedor->Nombre) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Direccion" class="form-label">Dirección</label>
                    <textarea class="form-control" id="Direccion" name="Direccion">{{ old('Direccion', $proveedor->Direccion) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
            </div>
        </div>
    </div>
</div>

