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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'descuento' => 'required|numeric|min:0|max:75',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_imagen' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('promociones', 'public');
            $data['Imagen'] = $path;
        }

        // Crear la promoción
        Promocion::create($data);

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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'alt_imagen' => 'nullable|string|max:255',
            'descuento' => 'required|numeric|min:0|max:100',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $promocion = Promocion::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('promociones', 'public');
            $data['imagen'] = $path;
        }

        if ($request->has('alt_imagen')) {
            $data['alt_imagen'] = $request->alt_imagen;
        }

        // Actualizar la promoción
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
