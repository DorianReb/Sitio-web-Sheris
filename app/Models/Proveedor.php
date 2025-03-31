<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $primaryKey = 'Id_proveedor';
    protected $fillable = ['Nombre', 'Direccion'];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_proveedor', 'Id_proveedor', 'Id_producto')
                    ->withPivot('Precio_venta', 'Stock_disponible');
    }
}
