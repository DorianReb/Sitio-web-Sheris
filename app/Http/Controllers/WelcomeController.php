<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function index()
    {
        // Obtener los últimos tres productos
        $productos = Producto::latest('created_at')->take(3)->get();

        // Obtener las promociones activas (donde la fecha de inicio es anterior a hoy y la fecha final es posterior a hoy)
        $promociones = Promocion::where('Fecha_inicio', '<=', Carbon::now())
            ->where('Fecha_final', '>=', Carbon::now())
            ->latest('created_at')
            ->get();

        // Pasar los datos a la vista
        return view('welcome', compact('productos', 'promociones'));
    }
}
