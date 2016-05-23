<?php

namespace Deposito;
use DB;

use Illuminate\Database\Eloquent\Model;

class ActivosFijosModel extends Model
{
    protected $table="activos";

    protected $fillable = [
        'inventario_id','clasesPUC_id', 'aniosUso','vidaUtil','depreciacion','descripcion','cuenta_id','cuenta'
    ];

	public static function ListadoActivos(){
		 return DB::table('activos')
			 ->join('inventarios','inventarios.id','=','activos.inventarios_id')
            ->join('elementos','elementos.id','=','inventarios.elemento_id')
            ->join('clasesPUC','clasesPUC.id','=','activos.clasesPUC_id')
            ->select('inventarios.valorUnitario','elementos.nombre','clasesPUC.nombreCuenta','clasesPUC.codigo','elementos.id as elementRef','elementos.id as elementRef','activos.aniosUso','activos.vidaUtil','activos.depreciacion', 'activos.descripcion')
            ->get();
     }

      

}
