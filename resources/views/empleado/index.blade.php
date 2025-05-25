@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Empleados</h1>
            <button type="button" class="btn btn-success shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa-solid fa-plus"></i> Añadir Nuevo Empleado
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
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>RFC</th>
                    <th>Puesto</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $loop->index + 1}}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->apellido_p }}</td>
                        <td>{{ $empleado->apellido_m }}</td>
                        <td>{{ $empleado->RFC }}</td>
                        <td>{{ $empleado->puesto->nombre ?? 'Sin Puesto' }}</td>
                        <td>{{ $empleado->contacto->correo ?? 'Sin Correo Electrónico' }}</td>
                        <td>{{ $empleado->contacto->telefono ?? 'Sin Teléfono' }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <button class="btn btn-warning shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $empleado->id_empleado }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </button>

                            <!-- Botón Eliminar -->
                            <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger shadow-sm rounded-pill" type="submit" onclick="return confirm('¿Seguro que deseas eliminar este empleado?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal de edición -->
                    @include('empleado.edit', ['empleado' => $empleado])
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--Modal de creación-->
    @include('empleado.create')

@endsection
