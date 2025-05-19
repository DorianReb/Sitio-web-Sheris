<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    public function index()
    {
        $metodos_pago = MetodoPago::all();
        return view('metodo_pago.index', compact('metodos_pago'));
    }

    public function create()
    {
        return view('metodo_pago.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'Metodo' => 'required|string|max:255|unique:metodo_pago,Metodo',
        ]);

        MetodoPago::create([
            'Metodo' => $request->Metodo,
        ]);

        return redirect()->route('metodo_pago.index')->with('success', 'Método de pago creado correctamente.');
    }


    public function show(MetodoPago $metodo_pago)
    {
        return view('metodo_pago.show', compact('metodo_pago'));
    }


    public function edit($Id_metodo_pago)
    {
        $metodo_pago = MetodoPago::findOrFail($Id_metodo_pago);
        return view('metodo_pago.edit', compact('metodo_pago'));
    }


    public function update(Request $request, $id_metodo_pago)
    {

        $request->validate([
            'Metodo' => 'required|unique:metodo_pago,Metodo,' . $id_metodo_pago . ',Id_metodo_pago'
        ]);

        // Obtener el método de pago a actualizar
        $metodo_pago = MetodoPago::findOrFail($id_metodo_pago);

        // Actualizar los datos del método de pago
        $metodo_pago->update([
            'Metodo' => $request->Metodo,
        ]);

        return redirect()->route('metodo_pago.index')->with('success', 'Método de pago actualizado correctamente.');
    }

    public function destroy($id_metodo_pago)
    {
        $metodo_pago = MetodoPago::findOrFail($id_metodo_pago);
        $metodo_pago->delete();

        return redirect()->route('metodo_pago.index')->with('success', 'Método de pago eliminado correctamente.');
    }
}
