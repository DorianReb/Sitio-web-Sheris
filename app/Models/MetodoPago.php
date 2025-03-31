<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodo_pago';
    protected $primaryKey = 'Id_metodo_pago';
    protected $fillable = ['Metodo'];

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'Id_metodo_pago');
    }
}
