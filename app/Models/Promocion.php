<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'promociones';
    protected $primaryKey = 'Id_promocion';
    public $timestamps = false; // 🔹 Desactiva timestamps
    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Descuento',
        'Fecha_inicio',
        'Fecha_final',
        'Imagen',   // Agregar Imagen al fillable
        'Alt_imagen' // Agregar Alt_imagen al fillable
    ];
}

