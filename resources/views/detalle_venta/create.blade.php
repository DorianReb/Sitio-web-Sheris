<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Agregar Detalle de Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('detalle_ventas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="Id_venta" class="form-label">Venta</label>
                        <select class="form-control" id="Id_venta" name="Id_venta" required>
                            @foreach($ventas as $venta)
                                <option value="{{ $venta->Id_venta }}">Venta #{{ $venta->Id_venta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Id_producto" class="form-label">Producto</label>
                        <select class="form-control" id="Id_producto" name="Id_producto" required>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->Id_producto }}">{{ $producto->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="Cantidad" name="Cantidad" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="Precio_unitario" class="form-label">Precio Unitario</label>
                        <input type="number" class="form-control" id="Precio_unitario" name="Precio_unitario" min="0" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>