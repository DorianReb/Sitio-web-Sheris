<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

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

        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'descripcion' => 'required|string|max:255',
        ]);


        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        // Retornar con un mensaje de éxito
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
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $id_categoria,
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
        // 'productos' es la relación del modelo Categoria con Productos

        // Prepara etiquetas y cantidades para las gráficas
        $labels = $categorias->pluck('Nombre')->toArray();
        $data = $categorias->pluck('productos_count')->toArray();

        return view('home', compact('labels', 'data'));
    }


}
