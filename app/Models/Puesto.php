<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    protected $table = 'puestos';
    protected $primaryKey = 'id_puesto';
    protected $fillable = ['nombre', 'descripcion', 'salario_base'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_puesto');
    }
}
