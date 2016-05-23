<?php

namespace Deposito;
use DB;

use Illuminate\Database\Eloquent\Model;

class InventarioModel extends Model
{
    protected $table="inventarios";

    protected $fillable = [
 'cantidad', 'elemento_id', 'grupo_id','dependencia_id','valorUnitario','valorTotal','donacion','estado','valorDepreciasion','ultimaDepreciacion'
    ];


    public static function ListadoInventario(){
		return DB::table('inventarios')
			->join('elementos','elementos.id','=','inventarios.elemento_id')
			->join('grupos','grupos.id','=','inventarios.grupo_id')
			->join('dependencias','dependencias.id','=','inventarios.dependencia_id')
			->select('inventarios.id','inventarios.cantidad','elementos.nombre as nombreElemento','grupos.nombre as nombreGrupo','dependencias.nombre as nombreDependencia','inventarios.valorUnitario','inventarios.valorTotal','elementos.id as elementRef',
                'inventarios.created_at','donacion','valorDepreciasion','ultimaDepreciacion')
            ->get();
	}

 public static function ListadoInventario2(){
		return DB::table('inventarios')
			->join('elementos','elementos.id','=','inventarios.elemento_id')
			->join('grupos','grupos.id','=','inventarios.grupo_id')
			->join('dependencias','dependencias.id','=','inventarios.dependencia_id')
			->select('elementos.id','elementos.nombre as nombreElemento')
            ->get();
	}

	public static function elementByCode($idElement){
		return DB::table('inventarios')
			->where('elemento_id','=', $idElement)
            ->get();
	}

	public static function actualizarDepreciacion($resultado,$fechaDepreciacion,$idElement){
		return DB::table('inventarios')
            ->where('elemento_id','=', $idElement)
            ->update(array('valorDepreciasion' => $resultado, 'ultimaDepreciacion' =>$fechaDepreciacion ));
	}

	// public static function ListadoInvetario(){
	// 	return DB::table('inventarios')
	// 		->join('elementos','elementos.id','=','inventarios.elemento_id')
	// 		->join('grupos','grupos.id','=','inventarios.grupo_id')
	// 		->join('dependencias','dependencias.id','=','inventarios.dependencia_id')
	// 		->select('inventarios.cantidad as cant,
	// 			 elementos.nombre as nombre_elementos,
	// 			  grupos.nombre as nombre_grupo,
	// 			   dependencias.nombre as nombre_dependencia,
	// 			    inventarios.valorUnitario as valorUnitario,
	// 			     inventarios.valorTotal,
	// 			      CASE inventarios.donacion  WHEN 1 THEN "Si" ELSE "No" END as donacion, 
	// 			      inventarios.created_at'
	// 			      )
 //            ->get();
	// }
}
