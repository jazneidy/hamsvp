<?php

namespace Deposito;
use DB;

use Illuminate\Database\Eloquent\Model;

class DocCuentaModel extends Model
{
    protected $table="cuenta_doc";

    protected $fillable = [ 
        'codigoCuenta','nombre_cuenta','debe',  'haber','beneficiario','documento_id'
    ];

}
