<?php

namespace Deposito;
use DB;

use Illuminate\Database\Eloquent\Model;

class InventarioSalidaModel extends Model
{
    protected $table="inventarioSalida";

    protected $fillable = [
        'cantidad_actual', 'elemento_id', 'grupo_id','dependencia_id','valorUnitario','estado','donacion','cantidad_salida'
    ];

}
