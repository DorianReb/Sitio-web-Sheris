@extends('layouts.app') <!-- Cambia 'app' según el layout de tu aplicación -->

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <h1 class="alert alert-success">Editar Proveedor</h1>
        </div>
    </div>
    <form action="{{ route('proveedores.update', $proveedor->Id_proveedor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <label for="Nombre" class="fs-4 text-dark">Nombre del Proveedor</label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <input type="text" id="Nombre" name="Nombre" value="{{ old('Nombre', $proveedor->Nombre) }}" required class="text-center form-control">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <label for="Direccion" class="fs-4 text-dark">Dirección del Proveedor</label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <input type="text" id="Direccion" name="Direccion" value="{{ old('Direccion', $proveedor->Direccion) }}" required class="text-center form-control">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8 text-center m-3">
                <button type="submit" class="btn btn-success">Actualizar Proveedor</button>
            </div>
        </div>
    </form>
@endsection
