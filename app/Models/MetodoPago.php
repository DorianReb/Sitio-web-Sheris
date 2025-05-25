<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetodoPago extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'metodo_pago';
    protected $primaryKey = 'Id_metodo_pago';
    protected $fillable = ['metodo'];
    public $timestamps = false;

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_metodo_pago');
    }
}
