<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos';
    protected $primaryKey = 'Id_contacto';
    protected $fillable = ['Correo', 'Telefono'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'Id_contacto');
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'Id_contacto');
    }
}
