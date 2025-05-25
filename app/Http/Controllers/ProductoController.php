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
        $productos = Producto::with(['categoria', 'proveedores', 'promociones'])->get();
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();

        return view('producto.index', compact('productos', 'categorias', 'proveedores'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('producto.create', compact('categorias', 'proveedores'));
    }

    public function show($id)
    {
        $producto = Producto::with(['categoria', 'proveedores', 'promociones'])->findOrFail($id);

        $productosRelacionados = Producto::with(['promociones']) // si también quieres promociones aquí
        ->where('id_categoria', $producto->id_categoria)
            ->where('id_producto', '!=', $producto->id_producto)
            ->take(4)
            ->get();

        return view('producto.show', compact('producto', 'productosRelacionados'));
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categorias,id_categoria',
        ]);

        $data = $request->all();

        if ($request->hasFile('imagen')) {
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'id_categoria' => 'required|exists:categorias,Id_categoria',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->id_categoria = $request->id_categoria;

        // Subir la imagen si existe
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $imagePath;
        } else {
            $producto->imagen = null;
        }

        $producto->alt_imagen = $request->alt_imagen;

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
        $categorias = Categoria::all();
        $query = Producto::with(['categoria', 'proveedores', 'promociones']);

        if ($request->filled('categoria')) {
            $query->where('id_categoria', $request->categoria);
        }

        if ($request->filled('buscar')) {
            $query->where(function ($q) use ($request) {
                $q->where('nombre', 'like', '%' . $request->buscar . '%')
                    ->orWhere('descripcion', 'like', '%' . $request->buscar . '%');
            });
        }

        $productos = $query->latest()->paginate(9);

        return view('producto.todos', compact('productos', 'categorias'));
    }
}
