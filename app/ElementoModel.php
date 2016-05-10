<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class ElementoModel extends Model
{
    protected $table="elementos";

    protected $fillable = [
        'nombre', 'descripcion','id'
    ];

    

}
