<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoReparto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'estado_reparto';
    protected $primaryKey = 'id_estado';
    protected $fillable = ['estado'];


    public const ESTADOS = [
        'En transito',
        'entregado',
        'pendiente',
    ];

    public $timestamps = false;

    public function repartos()
    {
        return $this->hasMany(Reparto::class, 'id_estado');
    }

    /**
     * Comprueba si un estado es válido antes de guardarlo.
     */
    public static function esEstadoValido(string $estado): bool
    {
        return in_array($estado, self::ESTADOS, true);
    }
}
