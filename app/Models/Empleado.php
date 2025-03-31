<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $primaryKey = 'Id_empleado';
    protected $fillable = ['Nombre', 'Apellido_p', 'Apellido_m', 'RFC', 'Id_puesto', 'Id_contacto'];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'Id_puesto');
    }

    public function contacto()
    {
        return $this->belongsTo(Contacto::class, 'Id_contacto');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'Id_empleado');
    }
}

