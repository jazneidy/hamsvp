<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\EntradaInventarioModel;
use Deposito\ProductoModel;


class InventarioController extends Controller
{
    //
    /*
    */

    public function index(){
    	$productosInventario= EntradaInventarioModel::Productos();
        // echo var_dump($productosInventario);
        // foreach ($productosInventario as  $inventario) {
        //    return  EntradaInventarioModel::NombreProducto($inventario->producto_id);
        //    return $inventario->producto_id;
        //    // EntradaInventarioModel::NombreProducto($inventario->nombre);
        // }
         
    	return view('inventario.read',compact('productosInventario'));

    }

    public function detalle(){
             
        return view('inventario.detalle');

    }

    public function edit($id){

        $entradas= EntradaInventarioModel::EntradasProductos($id);
        $salidas = EntradaInventarioModel::SalidaProductos($id);
    
        $a = array();
         
        foreach ($entradas as $entrada) {
           $a['entradas']=$entrada->cantidad;
        }
        foreach ($salidas as $salida) {
           $a['salidas'] = $salida->cantidad;
        }
       
        $a['disponibles'] = $a['entradas']-$a['salidas'];
        $stocks=json_encode($a);

        $detalles=EntradaInventarioModel::DetallesProductos($id);
        return view('inventario.detalle',['stocks'=>$stocks,'detalles'=>$detalles]);
      

    	// $productosInventario= EntradaInventarioModel::find($id);
        // $productos=ProductoModel::lists('nombre','id');
    	// return view('inventario.edit',['productos'=>$productos,'productosInventario'=>$productosInventario]);
    }

    public function create(){
        $productos=ProductoModel::lists('nombre','id');
    	return view('inventario.create',compact('productos'));
    }

	public function destroy($id){

    	EntradaInventarioModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/inventario');
    }

    public function update($id,Request $request){
    	$inventario= EntradaInventarioModel::find($id);
    	$inventario->fill($request->all());
    	$inventario->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/inventario');
    }


    public function store(Request $request){
    	EntradaInventarioModel::create([
    		'cantidad'         =>$request['cantidad'],
    		'operacion'        =>1,
    		'producto_id'      =>$request['producto_id']
    	]);

    	return redirect('/inventario')->with('mensaje','ingreso');
    }
}
