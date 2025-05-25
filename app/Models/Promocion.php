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
    protected $primaryKey = 'id_promocion';
    public $timestamps = true; //
    protected $fillable = [
        'nombre',
        'descripcion',
        'descuento',
        'fecha_inicio',
        'fecha_final',
        'imagen',
        'alt_imagen'
    ];

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'asignapromocion', 'id_promocion', 'id_producto')
            ->withTimestamps()
            ->withPivot('id_asignapromo')
            ->whereNull('asignapromocion.deleted_at');
    }

}

