<?php

namespace ActivosFijos;

use Illuminate\Database\Eloquent\Model;

class ActivosFijosModel extends Model
{
    protected $table="activos";

    protected $fillable = [
        'elemento_id', 'anosUso','vidaUtil','depreciacion','descripcion'
    ];

}
