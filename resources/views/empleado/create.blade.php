<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createModalLabel">Añadir Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('empleados.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido_p" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellido_p" name="apellido_p" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido_m" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellido_m" name="apellido_m" required>
                    </div>

                    <div class="mb-3">
                        <label for="RFC" class="form-label">RFC</label>
                        <input type="text" class="form-control" id="RFC" name="RFC" maxlength="13" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_puesto" class="form-label">Puesto</label>
                        <select class="form-select" id="id_puesto" name="id_puesto" required>
                            <option value="">Seleccione un puesto</option>
                            @foreach($puestos as $puesto)
                                <option value="{{ $puesto->id_puesto }}">{{ $puesto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_contacto" class="form-label">Contacto</label>
                        <select class="form-select" id="id_contacto" name="id_contacto" required>
                            <option value="">Seleccione un contacto</option>
                            @foreach($contactos as $contacto)
                                <option value="{{ $contacto->id_contacto }}">
                                    {{ $contacto->correo }} - {{ $contacto->telefono }}
                                </option>
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
