@extends("layouts.navbar_dashboard")

@section("content")
    <div class="row justify-content-center">
        <div class="col-6">
            <h2>Editar Puesto</h2>

            <form action="{{ route('puestos.update', $puesto->id_puesto) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $puesto->nombre) }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', $puesto->descripcion) }}" required>
                </div>

                <div class="mb-3">
                    <label for="salario_base" class="form-label">Salario Base</label>
                    <input type="number" id="salario_base" name="salario_base" class="form-control" value="{{ old('salario_base', $puesto->salario_base) }}" required>
                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('puestos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
