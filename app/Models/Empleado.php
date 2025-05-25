<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $fillable = ['nombre', 'apellido_p', 'apellido_m', 'RFC', 'id_puesto', 'id_contacto'];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'id_puesto');
    }

    public function contacto()
    {
        return $this->belongsTo(Contacto::class, 'id_contacto');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_empleado');
    }
}

