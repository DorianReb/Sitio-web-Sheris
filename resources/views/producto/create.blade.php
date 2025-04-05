<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Crear Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="Descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Precio" class="form-label">Precio</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="Precio" name="Precio" min="0" step="0.01" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="Stock" name="Stock" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="Id_categoria" class="form-label">Categoría</label>
                        <select class="form-control" id="Id_categoria" name="Id_categoria" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->Id_categoria }}">{{ $categoria->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen del Producto</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="alt_imagen" class="form-label">Texto Alternativo de la Imagen</label>
                        <input type="text" class="form-control" id="alt_imagen" name="alt_imagen">
                    </div>


                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
