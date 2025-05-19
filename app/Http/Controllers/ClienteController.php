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
            'Id_contacto' => 'required|exists:contactos,id',
            'Direccion_cliente' => 'required|string|max:255',
        ]);

        Cliente::create([
            'Id_contacto' => $request->Id_contacto,
            'Direccion_cliente' => $request->Direccion_cliente,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
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
            'Id_contacto' => 'required|exists:contactos,Id_contacto',
            'Direccion_cliente' => 'required|string|max:255',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'Id_contacto' => $request->Id_contacto,
            'Direccion_cliente' => $request->Direccion_cliente,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
