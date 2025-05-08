@extends('layouts.navbar_dashboard')

@section('content')
    <div class="row">
        <!-- Contenido Principal -->
        <div class="col-8 p-5 border">

            <!-- Sección de Productos por Categoría -->
            <div class="row">
                <h3 class="text-morena fw-bold">Productos por categorías</h3>

                <div class="row p-4">
                    @foreach ($categorias as $categoria)
                        <div class="col-2 card text-center shadow card-body bg-morena text-light fw-bold me-3 mb-4">
                            <h6>{{ $categoria->Nombre }}</h6>
                            <p>{{ $categoria->productos->count() }} productos</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Botones de Acciones -->
            <div class="mb-4">
                <a href="{{ route('productos.index') }}" class="btn btn-outline-primary me-3">
                    Ver todos los productos
                </a>
                <a href="{{ route('proveedores.index') }}" class="btn btn-outline-secondary">
                    Ver todos los proveedores
                </a>
            </div>

            <!-- Resumen de Datos -->
            <div class="row mb-4">
                <h3 class="fw-bold text-morena">Resumen</h3>
                <div class="col">
                    <div class="card text-white bg-primary shadow">
                        <div class="card-body">
                            <h5>Total productos</h5>
                            <h3>{{ $productos->count() }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-success shadow">
                        <div class="card-body">
                            <h5>Stock total</h5>
                            <h3>{{ $productos->sum('Stock') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card text-white bg-warning shadow">
                        <div class="card-body">
                            <h5>Proveedores</h5>
                            <h3>{{ $proveedores->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Últimos Productos Añadidos -->
            <div class="mt-4">
                <h5 class="fw-bold text-morena">Últimos productos añadidos</h5>

                <!-- Tabla de Productos -->
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Añadido</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($productos->sortByDesc('created_at')->take(5) as $producto)
                        <tr>
                            <td>{{ $producto->Nombre }}</td>
                            <td>{{ $producto->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
