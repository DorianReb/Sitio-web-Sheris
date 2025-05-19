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
        $pagos = Pago::all();
        return view('pago.index', compact('pagos'));
    }

    public function create()
    {
        $metodos_pago = MetodoPago::all();
        return view('pago.create', compact('metodos_pago'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'Monto' => 'required|numeric|min:1',
            'Id_metodo_pago' => 'required|exists:metodo_pago,Id_metodo_pago',
            'Fecha_pago' => 'required|date',
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
        return view('pago.show', compact('pago'));
    }

    // Vista para editar un pago
    public function edit($id_pago)
    {
        $pago = Pago::findOrFail($id_pago);
        $metodos_pago = MetodoPago::all();
        return view('pago.edit', compact('pago', 'metodos_pago'));
    }

    public function update(Request $request, $id_pago)
    {
        $request->validate([
            'Monto' => 'required|numeric|min:1',
            'Id_metodo_pago' => 'required|exists:metodo_pago,Id_metodo_pago',
            'Fecha_pago' => 'required|date',
        ]);

        $pago = Pago::findOrFail($id_pago);

        $pago->update([
            'Monto' => $request->Monto,
            'Id_metodo_pago' => $request->Id_metodo_pago,
            'Fecha_pago' => $request->Fecha_pago,
        ]);

        return redirect()->route('pagos.index')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy($id_pago)
    {
        $pago = Pago::findOrFail($id_pago);
        $pago->delete();

        return redirect()->route('pagos.index')->with('success', 'Pago eliminado correctamente.');
    }
}
