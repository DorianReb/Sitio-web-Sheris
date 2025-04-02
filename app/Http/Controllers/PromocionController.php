<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocion;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promociones = Promocion::all();
        return view('promocion.index', compact('promociones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promocion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'nullable|string',
            'Descuento' => 'required|numeric|min:0|max:100',
            'Fecha_inicio' => 'required|date',
            'Fecha_final' => 'required|date|after_or_equal:Fecha_inicio',
        ]);

        Promocion::create($request->all());

        return redirect()->route('promociones.index')->with('success', 'Promoción creada correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $promocion = Promocion::findOrFail($id);
        return view('promocion.edit', compact('promocion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'nullable|string',
            'Imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Alt_imagen' => 'nullable|string|max:255',
            'Descuento' => 'required|numeric|min:0|max:100',
            'Fecha_inicio' => 'required|date',
            'Fecha_final' => 'required|date|after_or_equal:Fecha_inicio',
        ]);

        $promocion = Promocion::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('Imagen')) {
            $path = $request->file('Imagen')->store('promociones', 'public');
            $data['Imagen'] = $path;
        }

        $promocion->update($data);

        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada exitosamente.');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function destroy($id)
    {
        $promocion = Promocion::findOrFail($id);
        $promocion->delete();
        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada exitosamente.');
    }
}
