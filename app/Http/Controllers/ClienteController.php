<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with('contacto')->get();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        $contactos = Contacto::all();

        return view('cliente.create', compact('contactos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'nullable|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
        ]);

        $contacto = Contacto::create([
            'telefono' => $request->telefono,
            'correo' => $request->correo,
        ]);

        Cliente::create([
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'direccion' => $request->direccion,
            'id_contacto' => $contacto->id_contacto,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show($id)
    {
        $cliente = Cliente::with('contacto')->findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }


    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $contactos = Contacto::all();
        return view('cliente.edit', compact('cliente', 'contactos'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'nullable|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->update([
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'direccion' => $request->direccion,
        ]);

        if ($cliente->contacto) {
            $cliente->contacto->update([
                'telefono' => $request->telefono,
                'correo' => $request->correo,
            ]);
        } else {
            $contacto = Contacto::create([
                'telefono' => $request->telefono,
                'correo' => $request->correo,
            ]);
            $cliente->id_contacto = $contacto->id_contacto;
            $cliente->save();
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }


    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
