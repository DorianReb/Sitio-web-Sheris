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
    protected $primaryKey = 'Id_producto';
    protected $fillable = [
        'Nombre', 'Descripcion', 'Imagen', 'Alt_imagen',
        'Precio', 'Stock', 'Id_categoria', 'Fecha_alta'
    ];

    public $timestamps = true;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'Id_categoria');
    }

    public function proveedores()
    {
        return $this->belongsToMany(Proveedor::class, 'producto_proveedor', 'Id_producto', 'Id_proveedor')
                    ->withPivot('Precio_venta', 'Stock_disponible');
    }
}
