@extends('layouts.navbar_dashboard')

@section('content')
<div class="container">
    <h1>Lista de Contactos</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Crear Nuevo Contacto</button>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactos as $contacto)
                <tr>
                    <td>{{ $contacto->Id_contacto }}</td>
                    <td>{{ $contacto->Correo }}</td>
                    <td>{{ $contacto->Telefono }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $contacto->Id_contacto }}">
                            Editar
                        </button>

                        <form action="{{ route('contactos.destroy', $contacto->Id_contacto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este contacto?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>

                {{-- Modal de edición --}}
                @include('contacto.edit', ['contacto' => $contacto])
            @endforeach
        </tbody>
    </table>
</div>

@include('contacto.create')

@endsection
