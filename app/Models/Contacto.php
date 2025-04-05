<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'contactos';
    protected $primaryKey = 'Id_contacto';
    protected $fillable = ['Correo', 'Telefono'];

    public $timestamps = false;
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'Id_contacto');
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'Id_contacto');
    }
}
