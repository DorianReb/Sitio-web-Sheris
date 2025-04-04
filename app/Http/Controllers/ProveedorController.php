<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedor.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Direccion' => 'nullable|string|max:255',
        ]);

        \Log::info('Datos recibidos para guardar: ', $request->all());

        //Creacion de la categoria
        Proveedor::create([
            'Nombre' => $request->Nombre,
            'Direccion' => $request->Direccion,
        ]);
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedores)
    {
        return view('proveedores.show', compact('proveedores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $id_proveedor)
    {
        $proveedor = Proveedor::findOrFail($id_proveedor);
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $Id_proveedor)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Direccion' => 'nullable|string|max:255',
        ]);

        $proveedor = Proveedor::findOrFail($Id_proveedor);

        $proveedor->update([
            'Nombre' => $request->Nombre,
            'Direccion' => $request->Direccion,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $id_proveedor)
    {
        $proveedor=Proveedor::findOrFail($id_proveedor);
        $proveedor->delete();

       \DB::statement('ALTER TABLE proveedores AUTO_INCREMENT = 1;');
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
    }

}
