@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Promociones</h1>
            <button type="button" class="btn btn-success shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa-solid fa-plus"></i> Agregar Promoción
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
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Descuento</th>
                    <th>Inicio</th>
                    <th>Final</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($promociones as $promocion)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $promocion->nombre }}</td>
                        <td>{{ $promocion->descripcion }}</td>
                        <td>{{ $promocion->descuento }}%</td>
                        <td>{{ $promocion->fecha_inicio }}</td>
                        <td>{{ $promocion->fecha_final }}</td>
                        <td>
                            @if($promocion->imagen)
                                <img src="{{ asset('storage/' . $promocion->imagen) }}" alt="Imagen de la promoción {{ $promocion->nombre }}" class="img-fluid" style="max-width: 100px;">
                            @else
                                <span>No disponible</span>
                            @endif
                        </td>
                        <td>
                            <!-- Modal Editar -->
                            <button class="btn btn-warning shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $promocion->id_promocion }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </button>

                            <!-- Modal Eliminar -->
                            <form action="{{ route('promociones.destroy', $promocion->id_promocion) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger shadow-sm rounded-pill" type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta promoción?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de Edición -->
                    @include('promocion.edit', ['promocion' => $promocion])
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal de creación -->
    @include('promocion.create')

@endsection
