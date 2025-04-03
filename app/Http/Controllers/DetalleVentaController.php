<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalles = DetalleVenta::with(['venta', 'producto'])->get();
        return view('detalle_venta.index', compact('detalles'));
    }

    public function create()
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('detalle_venta.create', compact('ventas', 'productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Id_venta' => 'required|exists:ventas,Id_venta',
            'Id_producto' => 'required|exists:productos,Id_producto',
            'Cantidad' => 'required|integer|min:1',
            'Precio_unitario' => 'required|numeric|min:0',
        ]);

        DetalleVenta::create($request->all());
        return redirect()->route('detalle_ventas.index')->with('success', 'Detalle de venta agregado correctamente.');
    }

    public function show(DetalleVenta $detalleVenta)
    {
        return view('detalle_venta.show', compact('detalleVenta'));
    }

    public function edit(DetalleVenta $detalleVenta)
    {
        $ventas = Venta::all();
        $productos = Producto::all();
        return view('detalle_venta.edit', compact('detalleVenta', 'ventas', 'productos'));
    }

    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        $request->validate([
            'Id_venta' => 'required|exists:ventas,Id_venta',
            'Id_producto' => 'required|exists:productos,Id_producto',
            'Cantidad' => 'required|integer|min:1',
            'Precio_unitario' => 'required|numeric|min:0',
        ]);

        $detalleVenta->update($request->all());
        return redirect()->route('detalle_ventas.index')->with('success', 'Detalle de venta actualizado.');
    }

    public function destroy(DetalleVenta $detalleVenta)
    {
        $detalleVenta->delete();
        return redirect()->route('detalle_ventas.index')->with('success', 'Detalle de venta eliminado.');
    }
}
