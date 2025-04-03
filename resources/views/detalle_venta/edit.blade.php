<div class="modal fade" id="editModal{{ $detalleVenta->Id_detalle }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Detalle de Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('detalle_ventas.update', $detalleVenta->Id_detalle) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="Id_venta" class="form-label">Venta</label>
                        <select class="form-control" id="Id_venta" name="Id_venta" required>
                            @foreach($ventas as $venta)
                                <option value="{{ $venta->Id_venta }}" {{ $detalleVenta->Id_venta == $venta->Id_venta ? 'selected' : '' }}>Venta #{{ $venta->Id_venta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Id_producto" class="form-label">Producto</label>
                        <select class="form-control" id="Id_producto" name="Id_producto" required>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->Id_producto }}" {{ $detalleVenta->Id_producto == $producto->Id_producto ? 'selected' : '' }}>{{ $producto->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="Cantidad" name="Cantidad" value="{{ $detalleVenta->Cantidad }}" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="Precio_unitario" class="form-label">Precio Unitario</label>
                        <input type="number" class="form-control" id="Precio_unitario" name="Precio_unitario" value="{{ $detalleVenta->Precio_unitario }}" min="0" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>