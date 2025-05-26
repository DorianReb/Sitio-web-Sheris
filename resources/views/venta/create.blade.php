<!-- Modal Crear Venta -->
<div class="modal fade" id="createVentaModal" tabindex="-1" aria-labelledby="createVentaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createVentaModalLabel">Crear Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ventas.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_empleado" class="form-label">Empleado</label>
                        <select class="form-select" id="id_empleado" name="id_empleado" required>
                            <option value="">Seleccione un empleado</option>
                            @foreach($empleados as $empleado)
                                <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_cliente" class="form-label">Cliente</label>
                        <select class="form-select" id="id_cliente" name="id_cliente" required>
                            <option value="">Seleccione un cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id_cliente }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_metodopago" class="form-label">Método de Pago</label>
                        <select class="form-select" id="id_metodopago" name="id_metodopago" required>
                            <option value="">Seleccione un método</option>
                            @foreach($metodos_pago as $metodo)
                                <option value="{{ $metodo->id_metodopago }}">{{ $metodo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <h6>Detalles de la venta</h6>
                    <table class="table" id="detallesTable">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th><button type="button" class="btn btn-sm btn-primary" id="addDetalleBtn">+ Agregar</button></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div class="mb-3 text-end">
                        <label class="form-label fw-bold">Total: $</label>
                        <input type="text" id="totalVenta" name="total" class="form-control d-inline-block w-auto" readonly value="0">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="submit" class="btn btn-success">Guardar Venta</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para agregar filas y calcular total -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productos = @json($productos);
        const detallesTableBody = document.querySelector('#detallesTable tbody');
        const addDetalleBtn = document.getElementById('addDetalleBtn');
        const totalInput = document.getElementById('totalVenta');

        function crearFilaDetalle() {
            const tr = document.createElement('tr');

            // Producto
            const tdProducto = document.createElement('td');
            const selectProducto = document.createElement('select');
            selectProducto.name = 'detalles[][id_producto]';
            selectProducto.classList.add('form-select');
            selectProducto.required = true;

            const optionDefault = document.createElement('option');
            optionDefault.value = '';
            optionDefault.text = 'Seleccione un producto';
            selectProducto.appendChild(optionDefault);

            productos.forEach(p => {
                const opt = document.createElement('option');
                opt.value = p.id_producto;
                opt.text = p.nombre;
                selectProducto.appendChild(opt);
            });
            tdProducto.appendChild(selectProducto);
            tr.appendChild(tdProducto);

            // Cantidad
            const tdCantidad = document.createElement('td');
            const inputCantidad = document.createElement('input');
            inputCantidad.type = 'number';
            inputCantidad.name = 'detalles[][cantidad]';
            inputCantidad.min = 1;
            inputCantidad.value = 1;
            inputCantidad.classList.add('form-control');
            inputCantidad.required = true;
            tdCantidad.appendChild(inputCantidad);
            tr.appendChild(tdCantidad);

            // Subtotal
            const tdSubtotal = document.createElement('td');
            const inputSubtotal = document.createElement('input');
            inputSubtotal.type = 'number';
            inputSubtotal.name = 'detalles[][subtotal]';
            inputSubtotal.min = 0;
            inputSubtotal.step = '0.01';
            inputSubtotal.value = 0;
            inputSubtotal.classList.add('form-control');
            inputSubtotal.readOnly = true;
            tdSubtotal.appendChild(inputSubtotal);
            tr.appendChild(tdSubtotal);

            // Eliminar
            const tdEliminar = document.createElement('td');
            const btnEliminar = document.createElement('button');
            btnEliminar.type = 'button';
            btnEliminar.classList.add('btn', 'btn-danger', 'btn-sm');
            btnEliminar.textContent = 'Eliminar';
            btnEliminar.onclick = () => {
                tr.remove();
                actualizarTotal();
            };
            tdEliminar.appendChild(btnEliminar);
            tr.appendChild(tdEliminar);

            // Actualización dinámica
            function actualizarSubtotal() {
                const productoId = selectProducto.value;
                const cantidad = parseFloat(inputCantidad.value) || 0;
                const producto = productos.find(p => p.id_producto == productoId);

                if (producto) {
                    const subtotal = cantidad * parseFloat(producto.precio);
                    inputSubtotal.value = subtotal.toFixed(2);
                } else {
                    inputSubtotal.value = 0;
                }
                actualizarTotal();
            }

            selectProducto.addEventListener('change', actualizarSubtotal);
            inputCantidad.addEventListener('input', actualizarSubtotal);

            return tr;
        }

        function actualizarTotal() {
            let total = 0;
            detallesTableBody.querySelectorAll('input[name="detalles[][subtotal]"]').forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            totalInput.value = total.toFixed(2);
        }

        addDetalleBtn.addEventListener('click', () => {
            const fila = crearFilaDetalle();
            detallesTableBody.appendChild(fila);
        });

        addDetalleBtn.click(); // una fila inicial
    });
</script>
