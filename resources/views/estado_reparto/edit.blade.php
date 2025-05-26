<!-- Modal Edición -->
                    <div class="modal fade" id="editModal{{ $estado->id_estado }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-warning text-dark">
                                    <h5 class="modal-title">Editar Estado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('estado_reparto.update', $estado->id_estado) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="estado" class="form-label">Estado</label>
                                            <select class="form-control" id="estado" name="estado" required>
                                                @foreach(\App\Models\EstadoReparto::ESTADOS as $estadoValue)
                                                    <option value="{{ $estadoValue }}" {{ $estadoValue == $estado->estado ? 'selected' : '' }}>{{ $estadoValue }}</option>
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