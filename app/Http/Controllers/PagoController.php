<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\MetodoPago; // Asegúrate de importar el modelo MetodoPago
use Illuminate\Http\Request;

class PagoController extends Controller
{
    // Mostrar todos los pagos
    public function index()
    {
        $pagos = Pago::all();  // Obtener todos los pagos
        return view('pago.index', compact('pagos'));  // Pasar los pagos a la vista
    }

    // Vista para crear un nuevo pago
    public function create()
    {
        $metodos_pago = MetodoPago::all();  // Obtener todos los métodos de pago disponibles
        return view('pago.create', compact('metodos_pago'));  // Mostrar formulario de creación
    }

    // Guardar un nuevo pago
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'Monto' => 'required|numeric|min:1',  // Validar monto como número y mínimo de 1
            'Id_metodo_pago' => 'required|exists:metodo_pago,Id_metodo_pago',  // Asegurarse de que el método de pago exista
            'Fecha_pago' => 'required|date',  // Validar la fecha de pago
        ]);

        // Crear el pago
        Pago::create([
            'Monto' => $request->Monto,
            'Id_metodo_pago' => $request->Id_metodo_pago,
            'Fecha_pago' => $request->Fecha_pago,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('pagos.index')->with('success', 'Pago creado correctamente.');
    }

    // Mostrar un pago específico
    public function show(Pago $pago)
    {
        return view('pago.show', compact('pago'));  // Mostrar detalles del pago
    }

    // Vista para editar un pago
    public function edit($id_pago)
    {
        $pago = Pago::findOrFail($id_pago);  // Obtener el pago por su ID
        $metodos_pago = MetodoPago::all();  // Obtener todos los métodos de pago disponibles
        return view('pago.edit', compact('pago', 'metodos_pago'));  // Vista para editar
    }

    // Actualizar un pago
    public function update(Request $request, $id_pago)
    {
        // Validación de datos
        $request->validate([
            'Monto' => 'required|numeric|min:1',
            'Id_metodo_pago' => 'required|exists:metodo_pago,Id_metodo_pago',
            'Fecha_pago' => 'required|date',
        ]);

        // Obtener el pago a actualizar
        $pago = Pago::findOrFail($id_pago);

        // Actualizar los datos del pago
        $pago->update([
            'Monto' => $request->Monto,
            'Id_metodo_pago' => $request->Id_metodo_pago,
            'Fecha_pago' => $request->Fecha_pago,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente.');
    }

    // Eliminar un pago
    public function destroy($id_pago)
    {
        $pago = Pago::findOrFail($id_pago);  // Buscar el pago
        $pago->delete();  // Eliminar el pago

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente.');
    }
}
