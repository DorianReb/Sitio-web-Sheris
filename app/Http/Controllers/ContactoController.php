<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::all();
        return view('contacto.index', compact('contactos'));
    }

    public function create()
    {
        return view('contacto.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'correo' => 'required|email|unique:contactos,Correo',
            'telefono' => 'required|numeric',
        ]);

        Contacto::create([
            'correo' => $request->correo,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('contactos.index')->with('success', 'Contacto creado correctamente.');
    }


    public function show(Contacto $contacto)
    {
        return view('contacto.show', compact('contacto'));
    }

    public function edit ($id_contacto)
    {
        $contacto = Contacto::findOrFail($id_contacto);
        return view('contacto.edit', compact('contacto'));
    }

    public function update(Request $request, $id_contacto)
    {
        $request->validate([
            'correo' => 'required|email|unique:contactos,Correo,' . $id_contacto . ',id_contacto',
            'telefono' => 'required|numeric',
        ]);

        $contacto = Contacto::findOrFail($id_contacto);

        $contacto->update([
            'correo' => $request->correo,
            'telefono' =>$request->telefono,
        ]);
        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado correctamente.');
    }

    public function destroy($id_contacto)
    {
        $contacto = Contacto::findOrFail($id_contacto);
        $contacto->delete();

        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado correctamente.');
    }
}

