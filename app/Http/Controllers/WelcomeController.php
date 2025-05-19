<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function index()
    {
        $productos = Producto::latest('created_at')->take(3)->get();

        $promociones = Promocion::where('Fecha_inicio', '<=', Carbon::now())
            ->where('Fecha_final', '>=', Carbon::now())
            ->latest('created_at')
            ->get();

        return view('welcome', compact('productos', 'promociones'));
    }
}
