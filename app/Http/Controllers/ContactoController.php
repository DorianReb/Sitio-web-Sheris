<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // Mostrar todos los contactos
    public function index()
    {
        $contactos = Contacto::all();
        // Obtener todos los contactos
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

        // Validación de datos
        $request->validate([
            'Correo' => 'required|email|unique:contactos,Correo',
            'Telefono' => 'required|numeric',
        ]);

        // Crear el contacto
        Contacto::create([
            'Correo' => $request->Correo,
            'Telefono' => $request->Telefono,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('contactos.index')->with('success', 'Contacto creado correctamente.');
    }


    // Mostrar un contacto específico
    public function show(Contacto $contacto)
    {
        return view('contacto.show', compact('contacto'));  // Mostrar detalles del contacto
    }

    // Vista para editar un contacto
    public function edit ($id_contacto)
    {
        $contacto = Contacto::findOrFail($id_contacto);
        return view('contacto.edit', compact('contacto'));  // Vista para editar
    }

    // Actualizar un contacto
    public function update(Request $request, $id_contacto)
    {
        $request->validate([
            'Correo' => 'required|email|unique:contactos,Correo,' . $id_contacto . ',Id_contacto',
            'Telefono' => 'required|numeric',
        ]);

        $contacto = Contacto::findOrFail($id_contacto);

        $contacto->update([
            'Correo' => $request->Correo,
            'Telefono' =>$request->Telefono,
        ]);  // Actualizar los datos del contacto
        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado correctamente.');
    }

    // Eliminar un contacto
    public function destroy($id_contacto)
    {
        $contacto = Contacto::findOrFail($id_contacto);
        $contacto->delete();  // Eliminar el contacto

        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado correctamente.');
    }
}

