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
            'Nombre' => 'required|string|max:255|unique:categorias,Nombre',
            'Descripcion' => 'required|string|max:255',
        ]);


        Categoria::create([
            'Nombre' => $request->Nombre,
            'Descripcion' => $request->Descripcion,
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
            'Nombre' => 'required|string|max:255|unique:categorias,Nombre,' . $id_categoria,
            'Descripcion' => 'required|string|max:255',
        ]);


        $categoria = Categoria::findOrFail($id_categoria);

        $categoria->update([
            'Nombre' => $request->Nombre,
            'Descripcion' => $request->Descripcion,
        ]);

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy($id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }


}
