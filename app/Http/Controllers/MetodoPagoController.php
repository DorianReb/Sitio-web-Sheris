<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    // Mostrar todos los métodos de pago
    public function index()
    {
        $metodos_pago = MetodoPago::all();  // Obtener todos los métodos de pago
        return view('metodo_pago.index', compact('metodos_pago'));  // Pasar los métodos de pago a la vista
    }

    // Vista para crear un nuevo método de pago
    public function create()
    {
        return view('metodo_pago.create');  // Mostrar el formulario de creación
    }

    // Guardar un nuevo método de pago
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'Metodo' => 'required|string|max:255|unique:metodo_pago,Metodo',  // Validar que el método sea único y no esté vacío
        ]);

        \Log::info('Datos recibidos para guardar: ', $request->all());

        // Crear el nuevo método de pago
        MetodoPago::create([
            'Metodo' => $request->Metodo,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('metodo_pago.index')->with('success', 'Método de pago creado correctamente.');
    }

    // Mostrar un método de pago específico
    public function show(MetodoPago $metodo_pago)
    {
        return view('metodo_pago.show', compact('metodo_pago'));  // Mostrar detalles del método de pago
    }

    // Vista para editar un método de pago
    public function edit($Id_metodo_pago)
    {
        $metodo_pago = MetodoPago::findOrFail($Id_metodo_pago);  // Obtener el método de pago por su ID
        return view('metodo_pago.edit', compact('metodo_pago'));  // Vista para editar
    }

    // Actualizar un método de pago
    public function update(Request $request, $id_metodo_pago)
    {
        // Validación de datos
        $request->validate([
            'Metodo' => 'required|unique:metodo_pago,Metodo,' . $id_metodo_pago . ',Id_metodo_pago'
        ]);

        // Obtener el método de pago a actualizar
        $metodo_pago = MetodoPago::findOrFail($id_metodo_pago);

        // Actualizar los datos del método de pago
        $metodo_pago->update([
            'Metodo' => $request->Metodo,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('metodo_pago.index')->with('success', 'Método de pago actualizado correctamente.');
    }

    // Eliminar un método de pago
    public function destroy($id_metodo_pago)
    {
        $metodo_pago = MetodoPago::findOrFail($id_metodo_pago);  // Buscar el método de pago
        $metodo_pago->delete();  // Eliminar el método de pago

        // Restablecer el auto-incremento
        \DB::statement('ALTER TABLE metodo_pago AUTO_INCREMENT = 1');

        return redirect()->route('metodo_pago.index')->with('success', 'Método de pago eliminado correctamente.');
    }
}
