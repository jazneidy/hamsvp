<?php

namespace Deposito;
use DB;

use Illuminate\Database\Eloquent\Model;

class EntradaInventarioModel extends Model
{
    protected $table="inventarios";

    protected $fillable = [
        'cantidad', 'operacion', 'producto_id'
    ];

	public static function Productos(){
		return DB::table('inventarios')
		    ->join('productos','productos.id','=','inventarios.producto_id')
			->select(DB::raw('SUM(inventarios.cantidad) as cantidad,producto_id,productos.nombre'))
            ->groupBy('producto_id')
            ->get();
	}

	public static function NombreProducto($id){
		return DB::table('inventarios')
			->join('productos','productos.id','=','inventarios.producto_id')
			->select('productos.nombre,productos.id')
            ->where('producto_id', '=', $id)
            ->get();
	}

	public static function EntradasProductos($id){
		return DB::table('inventarios')
			->select(DB::raw('SUM(inventarios.cantidad) as cantidad'))
            ->where('inventarios.producto_id', '=', $id)
            ->where('inventarios.operacion', '=', 1)
            ->get();
	}

	public static function SalidaProductos($id){
		return DB::table('inventarios')
			->select(DB::raw('SUM(ABS(inventarios.cantidad)) as cantidad'))
            ->where('inventarios.producto_id', '=', $id)
            ->where('inventarios.operacion', '=', 0)
            ->get();
	}

	public static function DetallesProductos($id){
		return DB::table('inventarios')
			->select(DB::raw('ABS(inventarios.cantidad) as cantidad,CASE operacion  WHEN 1 THEN "Entrada" ELSE "Salida" END as operacion'))
            ->where('inventarios.producto_id', '=', $id)
            ->get();
	}

	// public static function Productos(){
	// 	return DB::table('inventarios')
	// 		->join('productos','productos.id','=','inventarios.producto_id')
	// 		->select('inventarios.*', 'productos.nombre')
	// 		->get();
	// }
}
