<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Empleado;
use App\Models\Puesto;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $empleados = Empleado::with('puesto','contacto')->get();
        $puestos = Puesto::all();
        $contactos = Contacto::all();
        return view('empleado.index', compact('empleados','puestos', 'contactos'));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puestos = Puesto::all();
        $contactos = Contacto::all();
        return view('empleado.create', compact('puestos', 'contactos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'required|string|max:255',
            'RFC' => 'required|string|max:255|unique:empleados',
            'id_puesto' => 'required|exists:puestos,id_puesto',
            'id_contacto' => 'required|exists:contactos,id_contacto',
        ]);

        Empleado::create([
            'nombre' => $request->nombre,
            'apellido_p' => $request->apellido_p,
            'apellido_m' => $request->apellido_m,
            'RFC' => $request->RFC,
            'id_puesto' => $request->id_puesto,
            'id_contacto' => $request->id_contacto
        ]);

        return redirect()->route('empleados.index')->with('status', 'Empleado registrado exitosamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
        $puestos = Puesto::all();
        $contactos = Contacto::all();
        return view('empleado.edit', compact('empleado', 'puestos', 'contactos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_p' => 'required|string|max:255',
            'apellido_m' => 'required|string|max:255',
            'RFC' => 'required|string|max:255',
            'id_puesto' => 'required|exists:puestos,Id_puesto',
            'id_contacto' => 'required|exists:contactos,Id_contacto',
        ]);

        $data = $request->all();
        $empleado->update($data);


        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //
        $empleado->delete();
        return redirect()->route('empleados.index')->with('status', 'Empleado despedido exitosamente');
    }
}
