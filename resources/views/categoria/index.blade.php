@extends("layouts.app")

@section("content")
    <div class="row justify-content-center">
        <div class="col-8">
            <h1 class="alert alert-succes">Categorías</h1>
            <a href="{{route('categorias.create')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i>Agregar Categoria</a>
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
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre de la Categoría</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{ $categoria->Nombre }}</td>
                        <td>{{ $categoria->Descripcion }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('categorias.edit', $categoria->Id_categoria) }}"><i class="fa-solid fa-pen-to-square"></i>Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria->Id_categoria) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i>Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
