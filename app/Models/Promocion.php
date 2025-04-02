<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $table = 'promociones';
    protected $primaryKey = 'Id_promocion';
    public $timestamps = false; // 🔹 Desactiva timestamps
    protected $fillable = ['Nombre', 'Descripcion', 'Descuento', 'Fecha_inicio', 'Fecha_final'];
}

