<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    use HasFactory;

    protected $table = 'devoluciones';
    protected $primaryKey = 'Id_devolucion';
    protected $fillable = ['Id_venta', 'Motivo', 'Fecha_devolucion', 'Estado'];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'Id_venta');
    }
}
