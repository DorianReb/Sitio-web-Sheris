<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';
    protected $primaryKey = 'Id_pago';
    protected $fillable = ['Monto', 'Id_metodo_pago', 'Fecha_pago'];

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'Id_metodo_pago');
    }
}
