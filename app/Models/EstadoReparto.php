<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoReparto extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'estado_reparto';
    protected $primaryKey = 'Id_estado';
    protected $fillable = ['Estado'];


    public const ESTADOS = [
        'En tránsito',
        'Entregado',
        'Pendiente',
    ];

    public $timestamps = false;

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
