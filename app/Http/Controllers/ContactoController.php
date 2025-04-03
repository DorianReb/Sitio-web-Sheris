<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // Mostrar todos los contactos
    public function index()
    {
        $contactos = Contacto::all();  // Obtener todos los contactos
        return view('contacto.index', compact('contactos'));  // Pasar los contactos a la vista
    }

    // Vista para crear un nuevo contacto
    public function create()
    {
        return view('contacto.create');  // Mostrar el formulario de creación
    }

    // Guardar un nuevo contacto
    public function store(Request $request)
    {
        $request->validate([
            'Correo' => 'required|email|unique:contactos,Correo',
            'Telefono' => 'required|numeric',
        ]);

        Contacto::create($request->all());  // Crear el contacto
        return redirect()->route('contactos.index')->with('success', 'Contacto creado correctamente.');
    }

    // Mostrar un contacto específico
    public function show(Contacto $contacto)
    {
        return view('contacto.show', compact('contacto'));  // Mostrar detalles del contacto
    }

    // Vista para editar un contacto
    public function edit(Contacto $contacto)
    {
        return view('contacto.edit', compact('contacto'));  // Vista para editar
    }

    // Actualizar un contacto
    public function update(Request $request, Contacto $contacto)
    {
        $request->validate([
            'Correo' => 'required|email|unique:contactos,Correo,' . $contacto->Id_contacto,
            'Telefono' => 'required|numeric',
        ]);

        $contacto->update($request->all());  // Actualizar los datos del contacto
        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado correctamente.');
    }

    // Eliminar un contacto
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();  // Eliminar el contacto
        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado correctamente.');
    }
}

