@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Agregar Categoría</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <a href="{{route('categorias.index')}}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center   mt-5">
        <div class="col-6">
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                </div>

                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection

