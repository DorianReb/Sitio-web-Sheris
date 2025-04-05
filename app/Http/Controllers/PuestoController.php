<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    // Muestra todos los puestos
    public function index()
    {
        $puestos = Puesto::all();
        return view('puesto.index', compact('puestos'));
    }

    // Muestra el formulario de creación
    public function create()
    {
        return view('puesto.create');
    }

    // Guarda un nuevo puesto
    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'Nombre' => 'required|string|max:255|unique:puestos,Nombre',
            'Descripcion' => 'required|string|max:255',
            'Salario_base' => 'required|numeric|min:0',
        ]);

        // Crear puesto
        Puesto::create([
            'Nombre' => $request->Nombre,
            'Descripcion' => $request->Descripcion,
            'Salario_base' => $request->Salario_base,
        ]);

        return redirect()->route('puestos.index')->with('success', 'Puesto creado correctamente.');
    }

    // Muestra un puesto específico
    public function show(Puesto $puesto)
    {
        return view('puesto.show', compact('puesto'));
    }

    // Muestra el formulario de edición
    public function edit($id_puesto)
    {
        $puesto = Puesto::findOrFail($id_puesto);
        return view('puesto.edit', compact('puesto'));
    }

    // Actualiza un puesto
    public function update(Request $request, $id_puesto)
    {
        // Validación con clave primaria personalizada
        $request->validate([
            'Nombre' => 'required|string|max:255|unique:puestos,Nombre,' . $id_puesto . ',Id_puesto',
            'Descripcion' => 'required|string|max:255',
            'Salario_base' => 'required|numeric|min:0',
        ]);

        $puesto = Puesto::findOrFail($id_puesto);

        $puesto->update([
            'Nombre' => $request->Nombre,
            'Descripcion' => $request->Descripcion,
            'Salario_base' => $request->Salario_base,
        ]);

        return redirect()->route('puestos.index')->with('success', 'Puesto actualizado correctamente.');
    }

    // Elimina un puesto
    public function destroy($id_puesto)
    {
        $puesto = Puesto::findOrFail($id_puesto);
        $puesto->delete();

        // Opcional: reiniciar el auto_increment
        \DB::statement('ALTER TABLE puestos AUTO_INCREMENT = 1');

        return redirect()->route('puestos.index')->with('success', 'Puesto eliminado correctamente.');
    }
}
