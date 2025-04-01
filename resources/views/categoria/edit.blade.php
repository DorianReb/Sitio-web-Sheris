@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <h1 class="alert alert-success">Editar Categoría</h1>
        </div>
    </div>

    {{-- Mostramos errores de validación en caso de existir --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->Id_categoria) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Campo: Nombre de la Categoría --}}
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <label for="Nombre" class="fs-4 text-dark">Nombre de la Categoría</label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <input type="text" id="Nombre" name="Nombre"
                       value="{{ old('Nombre', $categoria->Nombre) }}"
                       required class="form-control text-center">
            </div>
        </div>

        {{-- Campo: Descripción de la Categoría --}}
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <label for="Descripcion" class="fs-4 text-dark">Descripción de la Categoría</label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
            <textarea id="Descripcion" name="Descripcion"
                      required class="form-control text-center"
                      rows="5">{{ old('Descripcion', $categoria->Descripcion) }}</textarea>
            </div>
        </div>

        {{-- Botón para actualizar la categoría --}}
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <button type="submit" class="btn btn-success">Actualizar Categoría</button>
            </div>
        </div>
    </form>
@endsection
