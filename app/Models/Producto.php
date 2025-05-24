<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'nombre', 'descripcion', 'imagen', 'alt_imagen',
        'precio', 'stock', 'id_categoria', 'fecha_alta'
    ];

    public $timestamps = true;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'producto_proveedor', 'id_producto', 'id_proveedor')
                    ->withPivot('precio_venta', 'stock_disponible');
    }
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'id_producto');
    }

    public function promociones()
    {
        return $this->belongsToMany(Promocion::class, 'asignapromocion', 'id_producto', 'id_promocion')
            ->withTimestamps()
            ->withPivot('id_asignapromo')
            ->whereNull('asignapromocion.deleted_at');
    }


}
