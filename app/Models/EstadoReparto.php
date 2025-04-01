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

    public const ESTADOS = [
        'En transito',
        'Entregado',
        'Pendiente',
    ];

    public function repartos()
    {
        return $this->hasMany(Reparto::class, 'Id_estado');
    }

    /**
     * Comprueba si un estado es válido antes de guardarlo.
     */
    public static function esEstadoValido(string $estado): bool
    {
        return in_array($estado, self::ESTADOS, true);
    }
}
