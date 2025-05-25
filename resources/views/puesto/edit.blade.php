                    <div class="modal fade" id="editModal{{ $puesto->Id_puesto }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Editar Puesto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('puestos.update', $puesto->Id_puesto) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        {{-- Campo Nombre --}}
                                        <div class="mb-3">
                                            <label for="Nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $puesto->Nombre) }}" required>
                                        </div>

                                        {{-- Campo Descripción --}}
                                        <div class="mb-3">
                                            <label for="Descripcion" class="form-label">Descripción</label>
                                            <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="{{ old('Descripcion', $puesto->Descripcion) }}" required>
                                        </div>

                                        {{-- Campo Salario Base --}}
                                        <div class="mb-3">
                                            <label for="Salario_base" class="form-label">Salario Base</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="Salario_base" name="Salario_base" value="{{ old('Salario_base', $puesto->Salario_base) }}" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>