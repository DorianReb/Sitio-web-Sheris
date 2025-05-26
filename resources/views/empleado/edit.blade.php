<div class="modal fade" id="editModal{{ $empleado->Id_empleado }}" tabindex="-1" aria-labelledby="editModalLabel{{ $empleado->Id_empleado }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title">Editar Empleado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $empleado->nombre }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido_p" class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" name="apellido_p" value="{{ $empleado->apellido_p }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="apellido_m" class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" name="apellido_m" value="{{ $empleado->apellido_m }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="RFC" class="form-label">RFC</label>
                        <input type="text" class="form-control" name="RFC" value="{{ $empleado->RFC }}" maxlength="13" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_puesto" class="form-label">Puesto</label>
                        <select class="form-control" name="id_puesto" required>
                            <option value="">Seleccione un puesto</option>
                            @foreach($puestos as $puesto)
                                <option value="{{ $puesto->id_puesto }}" {{ $empleado->id_puesto == $puesto->id_puesto ? 'selected' : '' }}>{{ $puesto->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_contacto" class="form-label">Contacto</label>
                        <select class="form-control" name="id_contacto" required>
                            <option value="">Seleccione un contacto</option>
                            @foreach($contactos as $contacto)
                                <option value="{{ $contacto->id_contacto }}" {{ $empleado->id_contacto == $contacto->id_contacto ? 'selected' : '' }}>
                                    {{ $contacto->correo }} - {{ $contacto->telefono }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa-solid fa-check"></i> Actualizar
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
