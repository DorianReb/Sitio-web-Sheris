<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'Id_cliente';
    protected $fillable = ['Id_contacto', 'Direccion_cliente'];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class, 'Id_contacto');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'Id_cliente');
    }
}
