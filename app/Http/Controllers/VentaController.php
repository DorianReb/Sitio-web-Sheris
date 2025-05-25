<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\MetodoPago;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\DetalleVenta;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['empleado', 'cliente', 'metodoPago'])->get();
        $metodos_pago = MetodoPago::all();
        $empleados = Empleado::all();
        $clientes = Cliente::all();

        return view('venta.create', compact('empleados', 'clientes', 'metodos_pago'));

    }


    public function create()
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        $metodos_pago = MetodoPago::all();
        return view('venta.create', compact('empleados', 'clientes','metodos_pago'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'id_empleado' => 'required|exists:empleados,id_empleado',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_metodopago' => 'required|exists:metodopago,id_metodopago',
            'detalles' => 'required|array|min:1',
            'detalles.*.id_producto' => 'required|exists:productos,id_producto',
            'detalles.*.cantidad' => 'required|integer|min:1',
            'detalles.*.subtotal' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            // Calcular el total sumando los subtotales
            $total = 0;
            foreach ($request->detalles as $detalle) {
                $total += $detalle['Subtotal'];
            }

            // Crear la venta usando el total calculado
            $venta = Venta::create([
                'fecha' => $request->fecha,
                'hora' => Carbon::now()->format('H:i:s'),
                'id_empleado' => $request->id_empleado,
                'id_cliente' => $request->id_cliente,
                'id_metodopago' => $request->id_metodopago,
                'total' => $total,
            ]);

            // Crear los detalles
            foreach ($request->detalles as $detalle) {
                $venta->detalles()->create([
                    'id_producto' => $detalle['id_producto'],
                    'cantidad' => $detalle['cantidad'],
                    'subtotal' => $detalle['subtotal'],
                ]);
            }

            DB::commit();
            return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error al guardar la venta: ' . $e->getMessage()]);
        }
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
        $metodo_pago = MetodoPago::all();
        return view('venta.edit', compact('venta', 'empleados', 'clientes','metodo_pago'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'fecha' => 'required|date',
            'id_empleado' => 'required|exists:empleados,id_empleado',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'id_metodopago' => 'required|exists:metodopago,id_metodopago',
            'detalles' => 'required|array|min:1',
            'detalles.*.id_producto' => 'required|exists:productos,id_producto',
            'detalles.*.cantidad' => 'required|integer|min:1',
            'detalles.*.subtotal' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            // Actualizar campos básicos
            $venta->update([
                'fecha' => $request->fecha,
                'id_empleado' => $request->id_empleado,
                'id_cliente' => $request->id_cliente,
                'id_metodopago' => $request->id_metodopago,
            ]);

            // Eliminar detalles previos (o implementa lógica para actualizar/crear/ eliminar específicos)
            $venta->detalles()->delete();

            $total = 0;
            // Crear nuevos detalles y sumar total
            foreach ($request->detalles as $detalle) {
                $venta->detalles()->create([
                    'id_producto' => $detalle['id_producto'],
                    'cantidad' => $detalle['cantidad'],
                    'subtotal' => $detalle['subtotal'],
                ]);
                $total += $detalle['Subtotal'];
            }

            // Actualizar total
            $venta->update(['total' => $total]);

            DB::commit();
            return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Error al actualizar la venta: ' . $e->getMessage()]);
        }
    }


    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}

