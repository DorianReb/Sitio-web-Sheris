<?php

namespace App\Http\Controllers;

use App\Models\AsignaPromocion;
use Illuminate\Http\Request;
use App\Models\Promocion;
use App\Models\Producto;

class AsignaPromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $asignaciones = AsignaPromocion::with(['producto', 'promocion'])->orderBy('id_asignapromo', 'asc')->get();

        $productos = Producto::all();
        $promociones = Promocion::all();

        return view('asignapromocion.index', compact('asignaciones', 'productos', 'promociones'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $productos = Producto::all();
        $promociones = Promocion::all();

        return view('asignapromocion.create', compact('productos', 'promociones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'id_promocion' => 'required|exists:promociones,id_promocion',
        ]);

        $existe = AsignaPromocion::where('id_producto', $request->id_producto)
            ->where('id_promocion', $request->id_promocion)
            ->first();

        if ($existe) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['La promoción ya está asignada a este producto.']);
        }

        AsignaPromocion::create($request->all());

        return redirect()->route('asignapromocion.index')->with('success', 'Promoción asignada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AsignaPromocion $asignaPromocion)
    {
        //
        $asignacion = $asignaPromocion->load(['producto', 'promocion']);
        return view('asignapromocion.show', compact('asignacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsignaPromocion $asignaPromocion)
    {
        //
        $productos = Producto::all();
        $promociones = Promocion::all();

        return view('asignapromocion.edit', [
            'asignacion' => $asignaPromocion,
            'productos' => $productos,
            'promociones' => $promociones
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_producto' => 'required|exists:productos,id_producto',
            'id_promocion' => 'required|exists:promociones,id_promocion',
        ]);

        $asignaPromocion = AsignaPromocion::findOrFail($id);

        $asignaPromocion->update($request->all());

        return redirect()->route('asignapromocion.index')->with('success', 'Asignación actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsignaPromocion $asignaPromocion)
    {
        $asignaPromocion->delete();

        return redirect()->route('asignapromocion.index')->with('success', 'Asignación eliminada correctamente.');
    }


    public function verProductos($id)
    {
        $promociones = Promocion::findOrFail($id);
        $productos = $promociones->productos()->paginate(10); // Asegúrate de tener una relación definida

        return view('asignapromocion.promocion-productos', compact('promociones', 'productos'));
    }

}
