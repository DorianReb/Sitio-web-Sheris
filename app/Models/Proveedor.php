<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    protected $fillable = ['nombre', 'direccion'];
    public $timestamps = false;

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_proveedor', 'id_proveedor', 'id_producto')
                    ->withPivot('precio_venta', 'stock_disponible');
    }
}
