<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'Id_usuario';
    protected $fillable = ['Nombre', 'Correo', 'Password', 'Rol'];

    protected $hidden = ['Password'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['Password'] = bcrypt($password);
    }
}
