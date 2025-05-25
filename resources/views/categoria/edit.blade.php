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
                <th>id_categoria </th>
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
                            <form action="{{ route('categorias.update', $categoria->id_categoria) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Campo nombre --}}
                                <div class="mb-3">
                                    <label for="nombre" class="fs-4 text-dark">nombre de la Categoría</label>
                                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required class="form-control">
                                </div>

                                {{-- Campo descripción --}}
                                <div class="mb-3">
                                    <label for="descripcion" class="fs-4 text-dark">Descripción de la Categoría</label>
                                    <textarea id="descripcion" name="descripcion" required class="form-control" rows="5">{{ old('descripcion', $categoria->descripcion) }}</textarea>
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
