<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $table = 'promociones';
    protected $primaryKey = 'Id_promocion';
    protected $fillable = ['Nombre', 'Descripcion', 'Imagen', 'Alt_imagen', 'Descuento', 'Fecha_inicio', 'Fecha_final'];
}

