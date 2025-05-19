<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Categoria extends Model
{
    //
    use softDeletes;

protected $table = 'categorias';
protected $primaryKey = 'Id_categoria';
    public $timestamps = false;
protected $fillable = ['Nombre', 'Descripcion'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria', 'Id_categoria');
    }
}
