<div class="modal fade" id="editModal{{ $producto->Id_producto }}" tabindex="-1" aria-labelledby="editModalLabel{{ $producto->Id_producto }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productos.update', $producto->Id_producto) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="Nombre" value="{{ $producto->Nombre }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="Descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" name="Descripcion" required>{{ $producto->Descripcion }}</textarea>
                    </div>

                    <!-- Campo Precio con símbolo de pesos -->
                    <div class="mb-3">
                        <label for="Precio" class="form-label">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="Precio" value="{{ $producto->Precio }}" min="0" step="0.01" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" name="Stock" value="{{ $producto->Stock }}" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="Id_categoria" class="form-label">Categoría</label>
                        <select class="form-control" name="Id_categoria" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->Id_categoria }}" {{ $producto->Id_categoria == $categoria->Id_categoria ? 'selected' : '' }}>{{ $categoria->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen del Producto</label>
                        <input type="file" class="form-control" name="imagen" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="alt_imagen" class="form-label">Texto Alternativo de la Imagen</label>
                        <input type="text" class="form-control" name="alt_imagen" value="{{ $producto->alt_imagen }}">
                    </div>

                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
