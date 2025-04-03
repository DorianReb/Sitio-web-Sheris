<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria', 'proveedores')->get();
        $categorias = Categoria::all(); // Asegura que esta variable se pasa a la vista
        $proveedores = Proveedor::all(); // También es útil para el select de proveedores en el modal de creación

        return view('producto.index', compact('productos', 'categorias', 'proveedores'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('producto.create', compact('categorias', 'proveedores'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('producto.edit', compact('producto', 'categorias', 'proveedores'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'nullable|string',
            'Imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Precio' => 'required|numeric|min:0',
            'Stock' => 'required|integer|min:0',
            'Id_categoria' => 'required|exists:categorias,Id_categoria',
            'Fecha_alta' => 'required|date',
        ]);

        $data = $request->all();

        if ($request->hasFile('Imagen')) {
            $data['Imagen'] = $request->file('Imagen')->store('productos', 'public');
        }

        $producto->update($data);

        if ($request->has('proveedores')) {
            $producto->proveedores()->sync($request->proveedores);
        }

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function store(Request $request)
{
    $request->validate([
        'Nombre' => 'required|string|max:255',
        'Descripcion' => 'nullable|string',
        'Imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'Alt_imagen' => 'nullable|string|max:255',
        'Precio' => 'required|numeric|min:0',
        'Stock' => 'required|integer|min:0',
        'Id_categoria' => 'required|exists:categorias,Id_categoria',
    ]);

    Producto::create([
        'Nombre' => $request->Nombre,
        'Descripcion' => $request->Descripcion,
        'Imagen' => $request->Imagen ? $request->file('Imagen')->store('productos', 'public') : null,
        'Alt_imagen' => $request->Alt_imagen,
        'Precio' => $request->Precio,
        'Stock' => $request->Stock,
        'Id_categoria' => $request->Id_categoria,
        'Fecha_alta' => now(),
    ]);

    return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
}


    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}