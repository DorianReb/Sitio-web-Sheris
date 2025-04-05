<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Muestra todas las categorías
    public function index()
        {
            $categorias = Categoria::all();  // Obtener todas las categorías
            return view('categoria.index', compact('categorias'));  // Pasar la variable 'categorias' a la vista
        }


    // Muestra el formulario de creación
    public function create()
    {
        return view('categoria.create');
    }

    // Guarda una nueva categoría en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'Nombre' => 'required|string|max:255|unique:categorias,Nombre',
            'Descripcion' => 'required|string|max:255',
        ]);

        // Depuración: Verificar los datos antes de crear la categoría
        \Log::info('Datos recibidos para guardar: ', $request->all());

        // Creación de la categoría
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
        $categoria = Categoria::findOrFail($id_categoria);  // Buscar la categoría por su ID
        return view('categoria.edit', compact('categoria'));  // Pasamos la categoría a la vista de edición
    }



    // Muestra el formulario de edición para una categoría específica


    // Actualiza una categoría en la base de datos
    public function update(Request $request, $id_categoria)
    {
        // Validación de datos
        $request->validate([
            'Nombre' => 'required|string|max:255|unique:categorias,Nombre,' . $id_categoria,
            'Descripcion' => 'required|string|max:255',
        ]);

        // Buscar la categoría por ID
        $categoria = Categoria::findOrFail($id_categoria);

        // Actualización de la categoría
        $categoria->update([
            'Nombre' => $request->Nombre,
            'Descripcion' => $request->Descripcion,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente');
    }

    // Elimina una categoría de la base de datos
    public function destroy($id_categoria)
    {
        $categoria = Categoria::findOrFail($id_categoria);
        $categoria->delete();  // Elimina la categoría

        // Restablecer el auto-incremento (opcional)
        \DB::statement('ALTER TABLE categorias AUTO_INCREMENT = 1');

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }


}
