<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    protected $table="clientes";

    protected $fillable = [
        'cedula', 'nombres', 'apellidos', 'direccion', 'telefono', 'correo'
    ];

}
