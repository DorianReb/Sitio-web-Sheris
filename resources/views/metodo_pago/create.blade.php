@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Agregar Estado de Reparto</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <a href="{{ route('estado_reparto.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <form action="{{ route('estado_reparto.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Nombre_estado" class="form-label">Nombre del Estado</label>
                    <input type="text" class="form-control" id="Nombre_estado" name="Nombre_estado" required>
                </div>

                <div class="mb-3">
                    <label for="Descripcion_estado" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="Descripcion_estado" name="Descripcion_estado" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
