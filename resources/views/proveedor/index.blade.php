@extends('layouts.app') <!-- Puedes cambiar el layout por el que corresponda a tu proyecto -->

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <h1 class="alert alert-success">Proveedores</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8 text-center">
            <a href="{{ route('proveedores.create') }}" class="btn btn-success">Agregar Proveedor</a>
        </div>
    </div>

    @if(session('success'))
        <div class="row justify-content-center mt-3">
            <div class="col-4 text-center">
                <p class="alert alert-success">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col" class="bg-success-subtle">#</th>
                    <th scope="col" class="bg-success-subtle">Nombre</th>
                    <th scope="col" class="bg-success-subtle">Dirección</th>
                    <th scope="col" class="bg-success-subtle text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proveedores as $proveedor)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td> <!-- Índice del proveedor -->
                        <td>{{ $proveedor->Nombre }}</td>
                        <td>{{ $proveedor->Direccion }}</td>
                        <td class="text-center">
                            <a class="btn btn-warning me-2" href="{{ route('proveedores.edit', $proveedor->Id_proveedor) }}">
                                Editar
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedor->Id_proveedor) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar este proveedor?');">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
