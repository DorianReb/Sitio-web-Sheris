<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsignaPromocion extends Model
{
    use SoftDeletes;

    protected $table = 'asignapromocion';
    protected $primaryKey = 'Id_asignapromo';

    protected $fillable = [
        'id_producto',
        'id_promocion',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    public function promocion()
    {
        return $this->belongsTo(Promocion::class, 'id_promocion', 'id_promocion');
    }
}

