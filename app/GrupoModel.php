<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class GrupoModel extends Model
{
    protected $table="grupos";

    protected $fillable = [
        'nombre', 'descripcion'
    ];

}
