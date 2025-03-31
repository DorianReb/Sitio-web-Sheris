<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $table = 'puestos';
    protected $primaryKey = 'Id_puesto';
    protected $fillable = ['Nombre', 'Descripcion', 'Salario_base'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'Id_puesto');
    }
}
