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
        // Obtener todos los contactos
        $contactos = Contacto::all();

        // Pasar la variable $contactos a la vista
        return view('cliente.create', compact('contactos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'required|string|max:255',
            'id_contacto' => 'required|exists:contactos,id_contacto',
            'direccion' => 'required|string|max:255',
        ]);

        Cliente::create($request->all());

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
        // Validar los datos de entrada
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'required|string|max:255',
            'id_contacto' => 'required|exists:contactos,Id_contacto',
            'direccion' => 'required|string|max:255',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
