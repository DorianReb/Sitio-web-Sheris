<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Registrar Nueva Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ventas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="Fecha" class="form-label">Fecha de Venta</label>
                        <input type="date" class="form-control" id="Fecha" name="Fecha" required>
                    </div>

                    <div class="mb-3">
                        <label for="Id_empleado" class="form-label">Empleado</label>
                        <select class="form-control" id="Id_empleado" name="Id_empleado" required>
                            <option value="">Seleccione un empleado</option>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->Id_empleado }}">{{ $empleado->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="Id_cliente" class="form-label">Cliente</label>
                        <select class="form-control" id="Id_cliente" name="Id_cliente">
                            <option value="">Seleccione un cliente (opcional)</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->Id_cliente }}">{{ $cliente->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
