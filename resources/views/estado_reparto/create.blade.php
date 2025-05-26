<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Agregar Estado de Reparto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('estado_reparto.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Estado" class="form-label">Estado</label>
                            <select class="form-control" id="Estado" name="Estado" required>
                                @foreach(\App\Models\EstadoReparto::ESTADOS as $estado)
                                    <option value="{{ $estado }}">{{ $estado }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-check"></i> Guardar
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

    <script>
        $('#formModal').on('hidden.bs.modal', function () {
            $('form')[0].reset();
        });
    </script>