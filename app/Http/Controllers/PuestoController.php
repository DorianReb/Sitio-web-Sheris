<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index()
    {
        $puestos = Puesto::all();
        return view('puesto.index', compact('puestos'));
    }

    public function create()
    {
        return view('puesto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:puestos,nombre',
            'descripcion' => 'required|string|max:255',
            'salario_base' => 'required|numeric|min:0',
        ]);

        Puesto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'salario_base' => $request->salario_base,
        ]);

        return redirect()->route('puestos.index')->with('success', 'Puesto creado correctamente.');
    }

    public function show(Puesto $puesto)
    {
        return view('puesto.show', compact('puesto'));
    }

    public function edit($id_puesto)
    {
        $puesto = Puesto::findOrFail($id_puesto);
        return view('puesto.edit', compact('puesto'));
    }

    public function update(Request $request, $id_puesto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:puestos,nombre,' . $id_puesto . ',id_puesto',
            'descripcion' => 'required|string|max:255',
            'salario_base' => 'required|numeric|min:0',
        ]);

        $puesto = Puesto::findOrFail($id_puesto);

        $puesto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'salario_base' => $request->salario_base,
        ]);

        return redirect()->route('puestos.index')->with('success', 'Puesto actualizado correctamente.');
    }

    public function destroy($id_puesto)
    {
        $puesto = Puesto::findOrFail($id_puesto);
        $puesto->delete();

        return redirect()->route('puestos.index')->with('success', 'Puesto eliminado correctamente.');
    }
}
