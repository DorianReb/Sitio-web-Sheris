<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    // Muestra todas las categorías
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {
        // Como $id_categoria no existe en store, no debe usarse en ignore()
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categorias', 'nombre'), // No uses ignore aquí, es para update
            ],
            'descripcion' => 'required|string|max:255',
        ]);

        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente');
    }

    public function show(Categoria $categoria)
    {
        return view('categoria.show', compact('categoria'));
    }

    public function edit($id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria);
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, $id_categoria)
    {
        $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categorias', 'nombre')->ignore($id_categoria, 'id_categoria'),
            ],
            'descripcion' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id_categoria);

        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy($id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }

    public function dashboard()
    {
        $categorias = Categoria::withCount('productos')->get();

        // Aquí debes usar el nombre correcto del campo, que según tu modelo es 'nombre' (todo en minúsculas)
        $labels = $categorias->pluck('nombre')->toArray();
        $data = $categorias->pluck('productos_count')->toArray();

        return view('home', compact('labels', 'data'));
    }
}

