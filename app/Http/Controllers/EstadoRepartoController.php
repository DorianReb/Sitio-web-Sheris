<?php

namespace App\Http\Controllers;

use App\Models\EstadoReparto;
use Illuminate\Http\Request;

class EstadoRepartoController extends Controller
{
    public function index()
    {
        $estados = EstadoReparto::all();
        return view('estado_reparto.index', compact('estados'));
    }


    public function create()
    {
        return view('estado_reparto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'estado' => 'required|string|in:' . implode(',', EstadoReparto::ESTADOS),
        ]);

        EstadoReparto::create([
            'estado' => $request->Estado,
        ]);

        return redirect()->route('estado_reparto.index')->with('success', 'Estado de reparto creado correctamente');
    }

    public function show(EstadoReparto $estadoReparto)
    {
        return view('estado_reparto.show', compact('estadoReparto'));
    }

    public function edit($id_estado)
    {
        $estado = EstadoReparto::findOrFail($id_estado);
        return view('estado_reparto.edit', compact('estado'));
    }

    public function update(Request $request, $id_estado)
    {
        $request->validate([
            'estado' => 'required|string|in:' . implode(',', EstadoReparto::ESTADOS),
        ]);

        $estado = EstadoReparto::findOrFail($id_estado);

        $estado->update([
            'estado' => $request->estado,
        ]);

        return redirect()->route('estado_reparto.index')->with('success', 'Estado de reparto actualizado correctamente');
    }

    public function destroy($id_estado)
    {
        $estado = EstadoReparto::findOrFail($id_estado);
        $estado->delete();

        return redirect()->route('estado_reparto.index')->with('success', 'Estado de reparto eliminado correctamente.');
    }
}
