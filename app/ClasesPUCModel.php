<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class ClasesPUCModel extends Model
{
    protected $table="ClasesPUC";

    protected $fillable = [
         'codigo','nombreCuenta','naturaleza','beneficiario','descripcion'
    ];

}
