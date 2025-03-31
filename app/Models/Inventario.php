<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventario';
    protected $primaryKey = 'Id_inventario';
    protected $fillable = ['Id_producto', 'Stock_actual', 'Fecha_actualizacion', 'Ubicacion'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Id_producto');
    }
}
