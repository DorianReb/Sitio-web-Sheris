@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Asignación de Promociones</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa-solid fa-plus"></i> Asignar Promoción
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-4">
                <p class="alert alert-success mt-2">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <thead class="table-dark rounded-top">
                <tr>
                    <th>ID</th>
                    <th>Promoción</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($asignaciones as $asignacion)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $asignacion->promocion->nombre ?? 'Sin promoción' }}</td>
                        <td>{{ $asignacion->producto->nombre ?? 'Sin producto' }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <button class="btn btn-warning shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $asignacion->Id_asignapromo }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </button>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('asignapromocion.destroy', $asignacion->id_asignapromo) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger shadow-sm rounded-pill" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </form>

                        </td>
                    </tr>

                    <!-- Modal de edición -->
                    @include('asignapromocion.edit', ['asignacion' => $asignacion])
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de creación -->
    @include('asignapromocion.create')

@endsection
