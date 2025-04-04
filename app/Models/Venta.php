<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $primaryKey = 'Id_venta';
    protected $fillable = ['Fecha', 'Id_empleado', 'Id_cliente'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'Id_empleado');
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'Id_cliente');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'Id_venta');
    }
}

