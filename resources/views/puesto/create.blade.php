    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Formulario de Puesto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('puestos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="Descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="Salario_base" class="form-label">Salario Base</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="Salario_base" name="Salario_base" value="{{ old('Salario_base', $puesto->Salario_base) }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Cerrar el modal después de enviar el formulario
        $('#formModal').on('hidden.bs.modal', function () {
            // Limpiar el formulario si es necesario
            $('form')[0].reset();
        });
    </script>
@endsection
