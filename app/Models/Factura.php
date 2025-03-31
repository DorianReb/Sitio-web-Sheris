<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';
    protected $primaryKey = 'Id_factura';
    protected $fillable = ['Id_venta', 'Fecha_emision', 'Monto_total'];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'Id_venta');
    }
}
