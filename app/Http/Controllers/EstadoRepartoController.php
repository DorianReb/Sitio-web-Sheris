<?php

namespace App\Http\Controllers;

use App\Models\EstadoReparto;
use Illuminate\Http\Request;

class EstadoRepartoController extends Controller
{
    // Muestra todos los estados de reparto
    public function index()
    {
        $estados = EstadoReparto::all();  // Obtener todos los estados de reparto
        return view('estado_reparto.index', compact('estados'));  // Pasar la variable 'estados' a la vista
    }

    // Muestra el formulario para crear un nuevo estado de reparto
    public function create()
    {
        return view('estado_reparto.create');
    }

    // Guarda un nuevo estado de reparto en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'Estado' => 'required|string|in:' . implode(',', EstadoReparto::ESTADOS),
        ]);

        // Depuración: Verificar los datos antes de guardar el estado
        \Log::info('Datos recibidos para guardar el estado de reparto: ', $request->all());

        // Creación del estado de reparto
        EstadoReparto::create([
            'Estado' => $request->Estado,
        ]);

        // Retornar con un mensaje de éxito
        return redirect()->route('estado_reparto.index')->with('success', 'Estado de reparto creado correctamente');
    }

    // Muestra el estado de reparto específico
    public function show(EstadoReparto $estadoReparto)
    {
        return view('estado_reparto.show', compact('estadoReparto'));
    }

    // Muestra el formulario de edición para un estado de reparto específico
    public function edit($id_estado)
    {
        $estado = EstadoReparto::findOrFail($id_estado);  // Buscar el estado por su ID
        return view('estado_reparto.edit', compact('estado'));  // Pasar el estado a la vista de edición
    }

    // Actualiza un estado de reparto en la base de datos
    public function update(Request $request, $id_estado)
    {
        // Validación de datos
        $request->validate([
            'Estado' => 'required|string|in:' . implode(',', EstadoReparto::ESTADOS),
        ]);

        // Buscar el estado por ID
        $estado = EstadoReparto::findOrFail($id_estado);

        // Actualización del estado de reparto
        $estado->update([
            'Estado' => $request->Estado,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('estado_reparto.index')->with('success', 'Estado de reparto actualizado correctamente');
    }

    // Elimina un estado de reparto de la base de datos
    public function destroy($id_estado)
    {
        $estado = EstadoReparto::findOrFail($id_estado);
        $estado->delete();  // Elimina el estado

        \DB::statement('ALTER TABLE estado_reparto AUTO_INCREMENT = 1');

        return redirect()->route('estado_reparto.index')->with('success', 'Estado de reparto eliminado correctamente.');
    }
}
