<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoReparto extends Model
{
    use HasFactory;

    protected $table = 'estado_reparto';
    protected $primaryKey = 'Id_estado';
    protected $fillable = ['Estado'];

    public function repartos()
    {
        return $this->hasMany(Reparto::class, 'Id_estado');
    }
}
