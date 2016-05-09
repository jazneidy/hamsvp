<?php

namespace Deposito;
use DB;

use Illuminate\Database\Eloquent\Model;

class DocumentoModel extends Model
{
    protected $table="documento";

    protected $fillable = [
        'tipo_doc', 'total'
    ];

}
