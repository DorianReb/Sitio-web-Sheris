@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-success">Estados de Reparto</h1>
            <button type="button" class="btn btn-success shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#formModal">
                <i class="fa-solid fa-plus"></i> Agregar Estado
            </button>
        </div>
    </div>

    <!-- Incluir modal de creación -->
    @include('estado_reparto.create')

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
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($estados as $estado)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $estado->estado }}</td>
                        <td>
                            <!-- Botón Editar -->
                            <a class="btn btn-warning shadow-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#editModal{{ $estado->id_estado }}">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>

                            <!-- Formulario Eliminar -->
                            <form action="{{ route('estado_reparto.destroy', $estado->id_estado) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger shadow-sm rounded-pill" type="submit">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Incluir modal de edición -->
                    @include('estado_reparto.edit', ['estado' => $estado])
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
