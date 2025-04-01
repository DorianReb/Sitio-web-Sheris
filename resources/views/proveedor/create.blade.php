@extends('layouts.app') <!-- Cambia 'app' según tu layout base -->

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <h1 class="alert alert-success">Agregar Proveedor</h1>
        </div>
    </div>
    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf

        <div class="row justify-content-center">
            <div class="col-6 text-center m-3">
                <label for="Nombre" class="fs-4 text-dark">Nombre del Proveedor</label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 text-center m-3">
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6 text-center m-3">
                <label for="Direccion" class="fs-4 text-dark">Dirección del Proveedor</label>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 text-center m-3">
                <input type="text" name="Direccion" id="Direccion" class="form-control" required>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6 text-center m-3">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>

    </form>
@endsection
