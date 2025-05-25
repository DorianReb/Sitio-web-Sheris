@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Puestos</h1>

            <!-- Botón para abrir modal Crear -->
            <button type="button" class="btn btn-success shadow-sm rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#formModal">
                <i class="fa-solid fa-plus"></i> Agregar Puesto
            </button>

            @include('puesto.create')
        </div>
    </div>

    @if(session('success'))
        <div class="row justify-content-center">
            <div class="col-4">
                <p class="alert alert-success">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5">
        <div class="col-8">
            <table class="table table-striped table-hover">
                <thead class="table-dark rounded-top">
                    <tr>
                        <th>id_puesto</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Salario Base</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($puestos as $puesto)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $puesto->nombre }}</td>
                        <td>{{ $puesto->descripcion }}</td>
                        <td>${{ number_format($puesto->salario_base, 2) }}</td>
                        <td>
                            <!-- Enlace para ir a la página de editar -->
                            <a href="{{ route('puestos.edit', $puesto->id_puesto) }}" class="btn btn-warning shadow-sm rounded-pill">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            <!-- Formulario para eliminar -->
                            <form action="{{ route('puestos.destroy', $puesto->id_puesto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger shadow-sm rounded-pill" type="submit"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
