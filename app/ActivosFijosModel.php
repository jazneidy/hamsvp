<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class ActivosFijosModel extends Model
{
    protected $table="activos";

    protected $fillable = [
        'elemento_id', 'aniosUso','vidaUtil','depreciacion','descripcion'
    ];

	public static function ListadoActivos(){
		return DB::table('activos')
			->join('elementos','elementos.id','=','inventarios.elemento_id')
			->select('elementos.nombre as nombreElemento','activos.aniosUso','activos.vidaUtil',
				'activos.depreciacion', 'activos.descripcion')
            ->get();
     }

}
