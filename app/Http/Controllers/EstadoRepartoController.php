<?php

namespace App\Http\Controllers;

use App\Models\EstadoReparto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $estadoTexto = ucfirst(strtolower($request->input('Estado')));


        $request->merge(['Estado' => $estadoTexto]); 

        $request->validate([
            'Estado' => 'required|string|unique:estado_reparto,estado'
        ]);

        $estado = new EstadoReparto();
        $estado->estado = $estadoTexto;
        $estado->save();

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

    public function update(Request $request, $id)
    {
        $estadoTexto = ucfirst(strtolower($request->input('estado')));
        $request->merge(['estado' => $estadoTexto]);

        $request->validate([
            'estado' => [
                'required',
                'string',
                Rule::unique('estado_reparto', 'estado')->ignore($id),
            ],
        ]);

        $estado = EstadoReparto::findOrFail($id);
        $estado->estado = $estadoTexto;
        $estado->save();

        return redirect()->route('estado_reparto.index')->with('success', 'Estado actualizado correctamente.');
    }


    public function destroy($id_estado)
    {
        $estado = EstadoReparto::findOrFail($id_estado);
        $estado->delete();

        return redirect()->route('estado_reparto.index')->with('success', 'Estado de reparto eliminado correctamente.');
    }
}
