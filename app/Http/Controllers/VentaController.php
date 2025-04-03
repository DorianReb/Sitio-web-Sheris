<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Empleado;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['empleado', 'cliente'])->get();
        $empleados = Empleado::all();
        $clientes = Cliente::all();

        return view('venta.index', compact('ventas', 'empleados', 'clientes'));
    }


    public function create()
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        return view('venta.create', compact('empleados', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Fecha' => 'required|date',
            'Id_empleado' => 'required|exists:empleados,Id_empleado',
            'Id_cliente' => 'required|exists:clientes,Id_cliente',
        ]);

        Venta::create($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente.');
    }

    public function show(Venta $venta)
    {
        $venta->load('detalles.producto', 'empleado', 'cliente');
        return view('venta.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        return view('venta.edit', compact('venta', 'empleados', 'clientes'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'Fecha' => 'required|date',
            'Id_empleado' => 'required|exists:empleados,Id_empleado',
            'Id_cliente' => 'required|exists:clientes,Id_cliente',
        ]);

        $venta->update($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}

