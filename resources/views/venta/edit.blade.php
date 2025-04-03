<div class="modal fade" id="editModal{{ $venta->Id_venta }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Venta #{{ $venta->Id_venta }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ventas.update', $venta->Id_venta) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="Fecha" class="form-label">Fecha de Venta</label>
                        <input type="date" class="form-control" id="Fecha" name="Fecha" value="{{ $venta->Fecha }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Id_empleado" class="form-label">Empleado</label>
                        <select class="form-control" id="Id_empleado" name="Id_empleado" required>
                            <option value="">Seleccione un empleado</option>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->Id_empleado }}" {{ $empleado->Id_empleado == $venta->Id_empleado ? 'selected' : '' }}>
                                    {{ $empleado->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Id_cliente" class="form-label">Cliente</label>
                        <select class="form-control" id="Id_cliente" name="Id_cliente">
                            <option value="">Seleccione un cliente (opcional)</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->Id_cliente }}" {{ $cliente->Id_cliente == $venta->Id_cliente ? 'selected' : '' }}>
                                    {{ $cliente->Nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
