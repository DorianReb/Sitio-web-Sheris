@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Editar Estado de Reparto</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <a href="{{ route('estado_reparto.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <form action="{{ route('estado_reparto.update', $estado->Id_estado_reparto) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Nombre_estado" class="form-label">Nombre del Estado</label>
                    <input type="text" class="form-control" id="Nombre_estado" name="Nombre_estado" value="{{ old('Nombre_estado', $estado->Nombre_estado) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Descripcion_estado" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="Descripcion_estado" name="Descripcion_estado" value="{{ old('Descripcion_estado', $estado->Descripcion_estado) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
            </form>
        </div>
    </div>
@endsection
