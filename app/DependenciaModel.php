<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class DependenciaModel extends Model
{
    protected $table="dependencias";

    protected $fillable = [
        'nombre', 'descripcion'
    ];

}
