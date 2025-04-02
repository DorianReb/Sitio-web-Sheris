@extends('layouts.navbar_dashboard')

@section('content')
<div class="container">
    <h1>Lista de Promociones</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Crear Nueva Promoción</button>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descuento</th>
                <th>Inicio</th>
                <th>Final</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promociones as $promocion)
                <tr>
                    <td>{{ $promocion->Id_promocion }}</td>
                    <td>{{ $promocion->Nombre }}</td>
                    <td>{{ $promocion->Descuento }}%</td>
                    <td>{{ $promocion->Fecha_inicio }}</td>
                    <td>{{ $promocion->Fecha_final }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $promocion->Id_promocion }}"><i class="fa-solid fa-pen-to-square"></i>Editar</button>

                        <form action="{{ route('promociones.destroy', $promocion->Id_promocion) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar esta promoción?')"><i class="fa-solid fa-trash"></i>Eliminar</button>
                        </form>
                    </td>
                </tr>

                {{-- Modal de edición para cada promoción --}}
                @include('promocion.edit', ['promocion' => $promocion])
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal de creación --}}
@include('promocion.create')

@endsection
