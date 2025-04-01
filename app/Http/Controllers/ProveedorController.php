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
        //
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
        ]);

        //Crear un nuevo proveedor
        Proveedor::create($request->all());

        //Redirigir y mostrar mensaje de éxito
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
        return view('proveedores.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Direccion' => 'required|string|max:255',
        ]);

        //Actualizar datos del proveedor
        $proveedor->update($request->all());

        //Redirigir y mostrar mensaje de éxito
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        //Eliminar el proveedor
        $proveedor->delete();

        //Redirigir y mostrar mensaje de éxito
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente');
    }
}
