@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <h1 class="alert alert-success">Categorías</h1>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
                <!-- Modal para editar la categoría -->
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $categoria->id_categoria }}">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </button>
                <div class="modal fade" id="editModal{{ $categoria->id_categoria }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Editar Categoría</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('categorias.update', $categoria->Id_categoria) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Campo Nombre --}}
                                <div class="mb-3">
                                    <label for="Nombre" class="fs-4 text-dark">Nombre de la Categoría</label>
                                    <input type="text" id="Nombre" name="Nombre" value="{{ old('Nombre', $categoria->Nombre) }}" required class="form-control">
                                </div>

                                {{-- Campo Descripción --}}
                                <div class="mb-3">
                                    <label for="Descripcion" class="fs-4 text-dark">Descripción de la Categoría</label>
                                    <textarea id="Descripcion" name="Descripcion" required class="form-control" rows="5">{{ old('Descripcion', $categoria->Descripcion) }}</textarea>
                                </div>

                                {{-- Botón de actualización --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Actualizar Categoría</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
        </tbody>
    </table>
@endsection
