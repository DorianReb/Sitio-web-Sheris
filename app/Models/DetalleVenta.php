<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleVenta extends Model
{
    use SoftDeletes;

    protected $table = 'detalle_ventas';
    protected $primaryKey = 'Id_detalle';
    public $timestamps = true;

    protected $fillable = [
        'Id_venta',
        'Id_producto',
        'Cantidad',
        'Subtotal',
    ];

    // Relaciones
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'Id_venta');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Id_producto');
    }
}
