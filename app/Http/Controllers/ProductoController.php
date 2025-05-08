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
            'Precio' => 'required|numeric',
            'Stock' => 'required|integer',
            'Id_categoria' => 'required|exists:categorias,Id_categoria',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = new Producto();
        $producto->Nombre = $request->Nombre;
        $producto->Descripcion = $request->Descripcion;
        $producto->Precio = $request->Precio;
        $producto->Stock = $request->Stock;
        $producto->Id_categoria = $request->Id_categoria;

        // Subir la imagen si existe
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $producto->Imagen = $imagePath;
        } else {
            $producto->Imagen = null;  // o una ruta por defecto si no hay imagen
        }

        $producto->Alt_imagen = $request->alt_imagen;

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }


    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function mostrarTodos(Request $request)
    {
        $categorias = \App\Models\Categoria::all();
        $query = \App\Models\Producto::query();

        if ($request->filled('categoria')) {
            $query->where('Id_categoria', $request->categoria);
        }

        if ($request->filled('buscar')) {
            $query->where(function ($q) use ($request) {
                $q->where('Nombre', 'like', '%' . $request->buscar . '%')
                    ->orWhere('Descripcion', 'like', '%' . $request->buscar . '%');
            });
        }

        $productos = $query->latest()->paginate(9);

        return view('producto.todos', compact('productos', 'categorias'));
    }
}
