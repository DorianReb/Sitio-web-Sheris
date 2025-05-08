@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Promociones</h1>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
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
                <thead>
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
                        <td>{{ $promocion->Id_promocion }}</td>
                        <td>{{ $promocion->Nombre }}</td>
                        <td>{{ $promocion->Descripcion }}</td>
                        <td>{{ $promocion->Descuento }}%</td>
                        <td>{{ $promocion->Fecha_inicio }}</td>
                        <td>{{ $promocion->Fecha_final }}</td>
                        <td>
                            @if($promocion->Imagen)
                                <img src="{{ asset('storage/' . $promocion->Imagen) }}" alt="Imagen de la promoción {{ $promocion->Nombre }}" class="img-fluid" style="max-width: 100px;">
                            @else
                                <span>No disponible</span>
                            @endif
                        </td>
                        <td>
                            <!-- Modal Editar -->
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $promocion->Id_promocion }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </button>

                            <!-- Modal Eliminar -->
                            <form action="{{ route('promociones.destroy', $promocion->Id_promocion) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que deseas eliminar esta promoción?')">
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
