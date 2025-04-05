<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;

class WelcomeController extends Controller
{
    public function index()
    {
        // Obtener productos con paginación
        $productos = Producto::all();  // Obtener todos los productos sin paginación
        $promociones = Promocion::all();  // Obtener todas las promociones sin paginación

        // Pasar los datos a la vista
        return view('welcome', compact('productos', 'promociones'));

    }
}
